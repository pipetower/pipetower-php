<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Action;
use Pipetower\PhpSdk\Resources\Run;

class ManagesActions extends ApiAction
{
    /**
     * Get all actions
     */
    public function all(array $params = []): array
    {
        return $this->transformCollection($this->pt->get('actions', $params), Action::class);
    }

    /**
     * Get the action for the given id
     */
    public function retrieve(string $actionId): Action
    {
        return new Action($this->pt->get("actions/$actionId"), $this->pt);
    }

    /**
     * Get the runs of the specified action
     */
    public function runs(string $actionId, array $params = []): array
    {
        return $this->transformCollection($this->pt->get("actions/$actionId/runs", $params), Run::class);
    }
}