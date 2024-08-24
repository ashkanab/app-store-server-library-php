<?php

namespace AshkanAb\AppStore\Models;

use ReflectionClass;

trait Mappable
{
    public function mapFromJson(array $data): void
    {
        $properties = (new ReflectionClass($this))->getProperties();

        foreach ($properties as $reflectionProperty){
            $key = $reflectionProperty->getName();
            $this->{'set'. ucfirst($key)}($data[$key] ?? null);
        }
    }
}
