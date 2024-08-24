<?php

namespace AshkanAb\AppStore;


class AppStore
{
//    public static function client(array $config = []): Client
//    {
//        if(!$config) {
//            $config = config('services.appstore');
//        }
//
//        return new Client(
//            self::factory()->config(
//                $config['bundle'],
//                now()->addMinutes(5),
//                $config['issuer_id'],
//                $config['key_id'],
//                config_path($config['private_key_path'])
//            )
//                ->setEnv($config['env'])
//                ->make()
//        );
//    }

    public static function factory(): Factory
    {
        return new Factory();
    }
}
