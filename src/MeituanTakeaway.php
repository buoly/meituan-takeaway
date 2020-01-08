<?php

namespace Buoly\MeituanTakeaway;

use Buoly\MeituanTakeaway\Config\Config;
use Buoly\MeituanTakeaway\Exceptions\InvalidArgumentException;

class MeituanTakeaway
{

    private $config;

    private $shop = '';
    private $shipping = '';
    private $medicine = '';
    private $comment = '';
    private $order = '';

    public function __construct($config)
    {
        $this->config = new Config($config);
    }

    public function __get($name)
    {
        if (!isset($this->$name)) {
            throw new InvalidArgumentException(ucfirst($name) . '类不存在');
        }

        if (!$this->$name) {
            $class_name = ucfirst($name);
            $application = "\\Buoly\\MeituanTakeaway\\Api\\{$class_name}";
            $this->$name = new $application($this->config);
        }

        return $this->$name;
    }

}