<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Metric;
use Pipetower\PhpSdk\Resources\Run;
use Pipetower\PhpSdk\Resources\Server;
use Pipetower\PhpSdk\Resources\Variable;

class ManagesServers extends ApiAction
{
    /**
     * Get all servers
     */
    public function all(array $params = []): array
    {
        return $this->transformCollection($this->pt->get('servers', $params), Server::class);
    }

    /**
     * Get the server for the given id
     */
    public function retrieve(string $serverId): Server
    {
        return new Server($this->pt->get("servers/$serverId"));
    }

    /**
     * Get the runs of the specified server
     */
    public function runs(string $serverId, array $params = []): array
    {
        return $this->transformCollection($this->pt->get("servers/$serverId/runs", $params), Run::class);
    }

    /**
     * Get the metrics of the specified server
     */
    public function metrics(string $serverId, array $params = []): array
    {
        return $this->transformCollection($this->pt->get("servers/$serverId/metrics", $params), Metric::class);
    }

    /**
     * Get the environment variables of the specified server
     */
    public function vars(string $serverId, array $params = []): array
    {
        return $this->transformCollection($this->pt->get("servers/$serverId/vars", $params), Variable::class);
    }
}