<?php

namespace Contributte\Psr7\DI;

use Contributte\Psr7\Psr7Request;
use Contributte\Psr7\Psr7RequestFactory;
use Contributte\Psr7\Psr7Response;
use Contributte\Psr7\Psr7ResponseFactory;
use Nette\DI\CompilerExtension;

class Psr7HttpExtension extends CompilerExtension
{

	/**
	 * Register services
	 *
	 * @return void
	 */
	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('request'))
			->setClass(Psr7Request::class)
			->setFactory(Psr7RequestFactory::class . '::fromNette');

		$builder->addDefinition($this->prefix('response'))
			->setClass(Psr7Response::class)
			->setFactory(Psr7ResponseFactory::class . '::fromNette');
	}

}
