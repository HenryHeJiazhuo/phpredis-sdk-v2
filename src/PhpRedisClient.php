<?php
/*
 * @Author: 何家卓
 * @Date: 2022-06-14 14:17:35
 * @LastEditors: 何家卓
 * @LastEditTime: 2022-06-15 10:36:09
 * @Description: 
 */

namespace PhpRedis;


class PhpRedisClient
{

    private static $config = [
        'host'       => '127.0.0.1',
        'port'       => 6379,
        'password'   => '',
        'select'     => 0,
        'timeout'    => 0,
        'expire'     => 0,
        'persistent' => false,
        'prefix'     => '',
        'serialize'  => true,
    ];

    private static $instance;


    public static function getInstance($config = [])
    {
        if (!extension_loaded('redis')) {
            throw new \Exception('缺少redis扩展!');
        }
        if (!empty($config)) {
            self::$config = array_merge(self::$config, $config);
        }
        if (!(self::$instance instanceof \Redis)) {
            $instance = self::$instance = new \Redis();
            $host = self::$config['host'];
            $port = self::$config['port'];
            $connResult = $instance->connect($host, $port);
            if (!$connResult) {
                throw new \Exception('redis连接失败');
            }
        }
        return self::$instance;
    }

    public static function set($key, $value, $option = [])
    {
        $redis = self::getInstance();
        return empty($option) ? $redis->set($key, $value) : $redis->set($key, $value, $option);
    }

    public static function get($key)
    {
        $redis = self::getInstance();
        return $redis->get($key);
    }
}
