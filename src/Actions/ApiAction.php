<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Pipetower;

abstract class ApiAction
{
    protected Pipetower $pt;

    /**
     * Create a new instance
     */
    public function __construct(Pipetower $pt)
    {
        $this->pt = $pt;
    }

    /**
     * Transform the returned API data-array into an array of resource models
     */
    protected function transformCollection(array $collection, string $class): array
    {
        return array_map(function ($attributes) use ($class) {
            return new $class($attributes, $this->pt);
        }, $collection);
    }
}