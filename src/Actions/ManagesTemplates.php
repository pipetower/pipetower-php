<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Template;

class ManagesTemplates extends ApiAction
{
    /**
     * Get all templates
     */
    public function all(array $params = []): array
    {
        return $this->transformCollection($this->pt->get('templates', $params), Template::class);
    }

    /**
     * Get the template for the given id
     */
    public function retrieve(string $templateId): Template
    {
        return new Template($this->pt->get("templates/$templateId"));
    }
}