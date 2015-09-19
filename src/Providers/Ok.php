<?php

namespace Shares\Providers;

use Shares\Provider;
use GuzzleHttp\Message\ResponseInterface;

class Ok extends Provider
{
	static protected $link = 'https://connect.ok.ru/dk?st.cmd=extLike&uid=odklocs0&ref=';

	public function getCount($content, ResponseInterface $response = null)
	{
		$matches = [];
		if (preg_match("/ODKL.updateCount\('odklocs0','(\d+)'\);/i", $content, $matches) === 0) {
			return false;
		}
		return (int) $matches[1];
	}
}