<?php

namespace Shares;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;

class Shares
{
	protected $providers = [];

	/**
	 * @var Client;
	 */
	protected $client;

	public function __construct($options = [])
	{
		$this->client = new Client($options);
	}

	/**
	 * @param Provider $provider
	 */
	public function addProvider(Provider $provider)
	{
		if (!isset($this->providers[$provider::getName()])) {
			$provider->setClient($this->client);
			$this->providers[$provider::getName()] = $provider;
		}
	}

	public function getCounts($url)
	{
		$requests = [];
		/** @var Provider $provider */
		foreach ($this->providers as $name => $provider) {
			$requests[$name] = $provider->getRequest($url);
		}

		$responses = Pool::batch($this->client, $requests);

		foreach ($requests as $name => $request) {
			$result = $responses->getResult($request);
			if ($result instanceof \Exception) {
				$requests[$name] = false;
			} else {
				$requests[$name] = $this->providers[$name]->getCount($result->getBody()->getContents(), $result);
			}
		}

		return $requests;
	}
}