<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Workflow;
use Pipetower\PhpSdk\Resources\Run;

class ManagesWorkflows extends ApiAction
{
    /**
     * Get all workflows
     */
    public function all(array $params = []): array
    {
        return $this->transformCollection($this->pt->get('workflows', $params), Workflow::class);
    }

    /**
     * Get the workflow for the given id
     */
    public function retrieve(string $workflowId): Workflow
    {
        return new Workflow($this->pt->get("workflows/$workflowId"));
    }

    /**
     * Get the runs of the specified workflow
     */
    public function runs(string $workflowId, array $params = []): array
    {
        return $this->transformCollection($this->pt->get("workflows/$workflowId/runs", $params), Run::class);
    }
}