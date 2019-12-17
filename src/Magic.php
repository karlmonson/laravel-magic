<?php

namespace KarlMonson\Magic;

use Illuminate\Foundation\Application;

class Magic
{
	/**
	* @var Illuminate\Foundation\Application $app
	*/
	protected $app;

	protected $config;

	protected $providers = [];

	public function __construct(Application $app) {
		$this->app = $app;
		$this->config = $this->app['config']['auth.providers'];

		foreach($this->config as $key => $config) {
			if($config['driver'] == 'magic') {
				$this->providers[$key] = new AuthManager($this->app, $key, $config);
			}
		}
	}

	public function __call($name, $arguments = array()) {
		if(array_key_exists($name, $this->providers)) {
			return $this->providers[$name];
		}
	}
}
