<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Account;
use Pipetower\PhpSdk\Resources\Variable;

class ManagesAccounts extends ApiAction
{
    /**
     * Get info about the current authenticated account
     */
    public function info(): Account
    {
        return new Account($this->pt->get('account'));
    }

    /**
     * Get the user variables of the current authenticated account
     */
    public function vars(array $params = []): array
    {
        return $this->transformCollection($this->pt->get("account/vars", $params), Variable::class);
    }
}