<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Run;

class ManagesRuns extends ApiAction
{
    /**
     * Get all runs
     */
    public function all(array $params = []): array
    {
        return $this->transformCollection($this->pt->get('runs', $params), Run::class);
    }

    /**
     * Create a new run
     */
    public function create(array $params): Run
    {
        return new Run($this->pt->post('runs', $params));
    }

    /**
     * Get the run for the given id
     */
    public function retrieve(string $runId): Run
    {
        return new Run($this->pt->get("runs/$runId"));
    }
}