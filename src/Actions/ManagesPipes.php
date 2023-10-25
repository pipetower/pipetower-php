<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Pipe;
use Pipetower\PhpSdk\Resources\Run;

class ManagesPipes extends ApiAction
{
    /**
     * Get all pipes
     */
    public function all(array $params = []): array
    {
        return $this->transformCollection($this->pt->get('pipes', $params), Pipe::class);
    }

    /**
     * Get the pipe for the given id
     */
    public function retrieve(string $pipeId): Pipe
    {
        return new Pipe($this->pt->get("pipes/$pipeId"));
    }

    /**
     * Get the runs of the specified pipe
     */
    public function runs(string $pipeId, array $params = []): array
    {
        return $this->transformCollection($this->pt->get("pipes/$pipeId/runs", $params), Run::class);
    }
}