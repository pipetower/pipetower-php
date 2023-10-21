<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Server;

class ManagesServers extends ApiAction
{
    /**
     * Get all servers
     */
    public function all(): array
    {
        return $this->transformCollection($this->pt->get('servers'), Server::class);
    }

    /**
     * Get the server for the given id
     */
    public function retrieve(string $id): Server
    {
        return new Server($this->pt->get("servers/$id"), $this->pt);
    }
}