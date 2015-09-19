<?php

namespace Shares;

use GuzzleHttp\Client;
use GuzzleHttp\Message\ResponseInterface;

abstract class Provider
{
	/** @var Client */
	protected $client;

	static protected $link;

	/**
	 * @return string
	 */
	static function getName()
	{
		return strtolower(array_pop(explode('\\', get_called_class())));
	}

	/**
	 * @param string $url
	 * @return mixed
	 */
	public function getRequest($url)
	{
		$url = static::$link . $url;
		return $this->client->createRequest('GET', $url);
	}

	/**
	 * @param string $content
	 * @param ResponseInterface|null $respose
	 * @return int|bool mixed
	 */
	abstract public function getCount($content, ResponseInterface $respose = null);

	/**
	 * @param Client $client
	 */
	public function setClient(Client $client)
	{
		$this->client = $client;
	}
}
