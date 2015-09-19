<?php

namespace Shares\Providers;

use Shares\Provider;
use GuzzleHttp\Message\ResponseInterface;


class Facebook extends Provider
{
	static protected $link = 'https://api.facebook.com/method/links.getStats?format=json&urls=';

	public function getCount($content, ResponseInterface $response = null)
	{
		// TODO: use total or share count?
		$data = $response->json();
		return (int) $data[0]['total_count'];
	}
}