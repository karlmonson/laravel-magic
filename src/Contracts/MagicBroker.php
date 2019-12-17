<?php

namespace KarlMonson\Magic\Contracts;

use Closure;

interface MagicBroker
{
    /**
     * Constant representing a successfully sent link.
     *
     * @var string
     */
    const LOGIN_LINK_SENT = 'magic.sent';

    /**
     * Constant representing a successful login.
     *
     * @var string
     */
    const MAGIC_LOGIN = 'magic.login';

    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = 'magic.user';

    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = 'magic.token';

    /**
     * Constant representing a throttled login attempt.
     *
     * @var string
     */
    const LOGIN_THROTTLED = 'magic.throttled';

    /**
     * Send a password reset link to a user.
     *
     * @param  array  $credentials
     * @return string
     */
    public function sendLoginLink(array $credentials);

    /**
     * Login the user for the given token.
     *
     * @param  array  $credentials
     * @param  \Closure  $callback
     * @return mixed
     */
    public function login(array $credentials);
}
