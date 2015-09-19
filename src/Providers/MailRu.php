<?php

namespace Shares\Providers;

use Shares\Provider;
use GuzzleHttp\Message\ResponseInterface;

class MailRu extends Provider
{
	static protected $link = 'https://connect.mail.ru/share_count?url_list=';

	public function getCount($content, ResponseInterface $response = null)
	{
		$data = $response->json();
		if (empty($data)) {
			return false;
		}
		return (int) array_shift($data)['shares'];
	}
}