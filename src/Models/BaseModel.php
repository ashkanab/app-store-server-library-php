<?php

namespace AppStore\Models;

use Stringable;

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
