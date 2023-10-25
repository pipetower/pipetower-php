<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\RunExecution;
use Pipetower\PhpSdk\Resources\RunExecutionDetail;

class ManagesRunExecutions extends ApiAction
{
    /**
     * Get the run execution for the given id
     */
    public function retrieve(string $runExecutionId): RunExecution
    {
        return new RunExecution($this->pt->get("run-executions/$runExecutionId"));
    }

    /**
     * Get the details for the specified run execution
     */
    public function details(string $runExecutionId): RunExecutionDetail
    {
        return new RunExecutionDetail($this->pt->get("run-executions/$runExecutionId/details"));
    }
}