<?php

namespace KarlMonson\Magic\Contracts;

interface MagicBrokerFactory
{
    /**
     * Get a magic broker instance by name.
     *
     * @param  string|null  $name
     * @return mixed
     */
    public function broker($name = null);
}
