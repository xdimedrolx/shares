# Shares

A simple PHP library to fetch the count of social shares. Supported providers: *vk.com, facebook.com, twitter.com, mail.ru, ok.ru*

## Requires

* php: >=5.4
* guzzlehttp/guzzle: ~5.3

## Install

```
composer require xdimedrolx/shares
```

## Usage

```php
<?php

require_once 'vendor/autoload.php';

$shares = new \Shares\Shares(['defaults' => ['verify' => false]]);
$shares->addProvider(new \Shares\Providers\Vk());
$shares->addProvider(new \Shares\Providers\Facebook());
$shares->addProvider(new \Shares\Providers\Twitter());
$shares->addProvider(new \Shares\Providers\MailRu());
$shares->addProvider(new \Shares\Providers\Ok());
$results = $shares->getCounts('https://github.com');

print_r($results);
```