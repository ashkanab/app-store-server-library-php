<?php

namespace AshkanAb\AppStore\Models;


class BaseModel
{
    use Mappable;
    public function __construct(array $data = [])
    {
        if(!is_null($data)){
            $this->mapFromJson($data);
        }
    }

    private function getProperties() : array
    {
        return get_object_vars($this);
    }
}
