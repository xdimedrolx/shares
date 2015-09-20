# Shares

A simple PHP library to fetch the count of social shares. Supports providers for *vk.com, facebook.com, twitter.com, mail.ru, ok.ru*

## Install

// todo

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