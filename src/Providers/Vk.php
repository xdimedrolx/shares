<?php

namespace Shares\Providers;

use Shares\Provider;
use GuzzleHttp\Message\ResponseInterface;

class Vk extends Provider
{
	static protected $link = 'https://vk.com/share.php?act=count&index=1&url=';

	public function getCount($content, ResponseInterface $response = null)
	{
		$matches = [];
		if (preg_match('/VK.Share.count\(1, (\d+)\);/', $content, $matches) === 0) {
			return false;
		}
		return (int) $matches[1];
	}
}