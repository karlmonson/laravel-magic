<?php

namespace KarlMonson\Magic\Traits;

use KarlMonson\Magic\Notifications\SendLoginLink;

trait Magical
{
	/**
     * Send the magic login notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendMagicLoginNotification($token)
    {
        $this->notify(new SendLoginLink($token));
    }
}
