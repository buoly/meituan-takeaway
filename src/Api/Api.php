<?php

namespace Buoly\MeituanTakeaway\Api;

use Buoly\MeituanTakeaway\Config\Config;
use GuzzleHttp\Client;

class Api
{
    private $config;
    private $log;

    protected $guzzleOptions = [];

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->log = $config->getLogger();
    }

    public function get($action, array $options = [])
    {
        $params_head = array(
            'timestamp'=>time(),
            'app_id' =>$this->config->app_id,
        );

        $options = array_merge($params_head, $options);

        $sig = $this->generate_signature($this->config->request_url.$action, $options);

        $options['sig'] = $sig;

        $url = $this->config->request_url.$action;

        return $this->request('GET', $url, ['query' => $options]);
    }

    public function post($action, array $params = [])
    {
        $params_head = array(
            'timestamp'=>time(),
            'app_id' =>$this->config->app_id,
        );

        $params = array_merge($params_head, $params);

        $sig = $this->generate_signature($this->config->request_url.$action, $params);

        $url = $this->config->request_url.$action;

        return $this->request('POST', $url, ['form_params' => $params]);
    }

    private function generate_signature($action, $params) {
        $params = $this->concatParams($params);
        $str = $action.'?'.$params.$this->config->app_secret;
        return md5($str);
    }

    private function concatParams($params) {
        ksort($params);
        $pairs = array();
        foreach($params as $key=>$val) {
            array_push($pairs, $key . '=' . $val);
        }
        return join('&', $pairs);
    }

    public function json($url, $query = [])
    {
        return $this->request('POST', $url, ['json' => $query]);
    }

    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

    public function request($method, $url, $options = [])
    {
        $log_id = $this->createRequestId();

        $method = strtoupper($method);

        $this->log->debug('API Request:', compact('log_id', 'url', 'method', 'options'));

        $response = $this->getHttpClient()->request($method, $url, $options);

        $this->log->debug('API Response:', [
            'log_id'  => $log_id,
            'Status'  => $response->getStatusCode(),
            'Reason'  => $response->getReasonPhrase(),
            'Headers' => $response->getHeaders(),
            'Body'    => strval($response->getBody()),
        ]);

        return $response->getBody();
    }

    private function createRequestId()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}