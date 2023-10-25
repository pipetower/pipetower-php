<?php

namespace Pipetower\PhpSdk\Resources;

abstract class ApiResource
{
    public array $attributes;
    public string $id;

    /**
     * Create a new instance of the API resource
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
        $this->fill($attributes);
    }

    /**
     * Set and fill properties on the resource for all returned attributes
     */
    private function fill(array $attributes): void
    {
        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }
    }
}