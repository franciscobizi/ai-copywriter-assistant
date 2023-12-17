<?php

namespace FBIZI\AICopywriterAssistant;

class API
{
    private string $api_key = '';
    private array $body = [];
    private string $method = '';
    protected array $config = []; 
    public function __construct($config){
        $this->api_key = $config['api_key'] ?? '';
        $this->config = $config;
    }
    public function fetch($method, $uri, $body = []){
        $this->checkConfig();
        $this->body = $body;
        $this->method = !empty($method) ? $method : "POST";

        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.openai.com/v1/']);
        $response = $client->request($this->method, $uri, [
            'headers' => [
                'Authorization' => "Bearer {$this->api_key}"
            ],
            'json' => $this->body,
        ]);

        return $response;
    }
    private function checkConfig()
    {
        if( empty($this->api_key)){
            throw new \Exception("Missign api_key");
        }
    }
}
