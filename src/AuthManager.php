<?php

namespace KarlMonson\Magic;

use Illuminate\Auth\AuthManager as OriginalAuthManager;

class AuthManager extends OriginalAuthManager {

	protected $config;
	protected $name;

	public function __construct($app, $name, $config) {
		parent::__construct($app);

		$this->config = $config;
		$this->name = $name;
	}

	protected function createDriver($driver) {
		$guard = parent::createDriver($driver);

		$guard->setCookieJar($this->app['cookie']);
		$guard->setDispatcher($this->app['events']);
		return $guard->setRequest($this->app->refresh('request', $guard, 'setRequest'));
	}

	public function createMagicDriver() {
		$provider = $this->createMagicProvider();
		return new Guard($provider, $this->app['session.store'], $this->name);
	}

	protected function createMagicProvider() {
		$model = $this->config['model'];
		return new MagicUserProvider($model);
	}
}
