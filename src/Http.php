<?php

namespace AppStore;

use Exception;

final class Http
{
    const PRODUCTION_URL = 'https://api.storekit.itunes.apple.com/';
    const SANDBOX_URL = 'https://api.storekit-sandbox.itunes.apple.com/';

    public function __construct(private readonly string $bearerToken, private readonly bool $sandbox = false)
    {
    }


    private function getUrl(string $endpoint): string
    {
        return ($this->sandbox ? self::SANDBOX_URL : self::PRODUCTION_URL) . $endpoint;
    }

    public function get(string $endpoint, $queryParams = [])
    {
        if(!is_null($queryParams)){
            $endpoint .= '?'. http_build_query($queryParams);
        }

        return $this->send($endpoint, 'GET');
    }

    public function post(string $endpoint, $params = [])
    {
        return $this->send($endpoint, 'POST', $params);
    }

    public function put(string $endpoint, $params = [])
    {
        return $this->send($endpoint, 'PUT', $params);
    }


    private function send(string $endpoint, string $method, array $params = [])
    {
        $curl = curl_init();

        if ($method === 'POST' || $method === 'PUT') {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->getUrl($endpoint),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->bearerToken
            ]
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($httpCode !== 200) {
            throw new Exception($response .' http_status: '. $httpCode);
        }

        return json_decode($response, true);
    }
}
