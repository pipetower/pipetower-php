<?php

namespace Pipetower\PhpSdk\Actions;

use Pipetower\PhpSdk\Resources\Account;

class ManagesAccounts extends ApiAction
{
    /**
     * Get info about the current authenticated account
     */
    public function info(): Account
    {
        return new Account($this->pt->get('account'), $this->pt);
    }
}