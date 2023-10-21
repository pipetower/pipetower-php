<?php

namespace Pipetower\PhpSdk\Resources;

use Pipetower\PhpSdk\Pipetower;

abstract class ApiResource
{
    private Pipetower $pt;
    public array $attributes;
    public string $id;

    /**
     * Create a new instance of the API resource
     */
    public function __construct(array $attributes, Pipetower $pt)
    {
        $this->pt = $pt;
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