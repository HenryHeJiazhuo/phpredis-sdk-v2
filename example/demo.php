<?php
/*
 * @Author: 何家卓
 * @Date: 2022-06-14 14:52:01
 * @LastEditors: 何家卓
 * @LastEditTime: 2022-06-14 15:02:01
 * @Description: 
 */
// echo 'example';
use PhpRedis\PhpRedisClient;

// echo __DIR__ . '../vendor/autoload.php';
// die;
require_once __DIR__ . '/../vendor/autoload.php';
// die;

// new PhpRedisClient();
$cache = PhpRedisClient::get('key202204118');
print_r($cache);
