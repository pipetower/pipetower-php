<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Team;
use Pipetower\PhpSdk\Resources\Variable;

class ManagesTeams extends ApiAction
{
    /**
     * Get all teams
     */
    public function all(array $params = []): array
    {
        return $this->transformCollection($this->pt->get('teams', $params), Team::class);
    }

    /**
     * Get the team for the given id
     */
    public function retrieve(string $teamId): Team
    {
        return new Team($this->pt->get("teams/$teamId"));
    }

    /**
     * Get the team variables of the specified team
     */
    public function vars(string $teamId): array
    {
        return $this->transformCollection($this->pt->get("teams/$teamId/vars"), Variable::class);
    }
}