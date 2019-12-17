<?php

namespace KarlMonson\Magic\Facades;

use Illuminate\Support\Facades\Facade;
use KarlMonson\Magic\Contracts\MagicBroker;

/**
 * @method static string sendResetLink(array $credentials)
 * @method static mixed reset(array $credentials, \Closure $callback)
 *
 * @see \KarlMonson\Magic\MagicBroker
 */
class Magic extends Facade
{
    /**
     * Constant representing a successfully sent reminder.
     *
     * @var string
     */
    const LOGIN_LINK_SENT = MagicBroker::LOGIN_LINK_SENT;

    /**
     * Constant representing a successfully reset password.
     *
     * @var string
     */
    const MAGIC_LOGIN = MagicBroker::MAGIC_LOGIN;

    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = MagicBroker::INVALID_USER;

    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = MagicBroker::INVALID_TOKEN;

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth.magic';
    }
}
