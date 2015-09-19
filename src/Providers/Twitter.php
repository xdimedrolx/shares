<?php

namespace Shares\Providers;

use Shares\Provider;
use GuzzleHttp\Message\ResponseInterface;

class Twitter extends Provider
{
	static protected $link = 'https://urls.api.twitter.com/1/urls/count.json?url=';

	public function getCount($content, ResponseInterface $response = null)
	{
		$data = $response->json();
		return (int) $data['count'];
	}
}