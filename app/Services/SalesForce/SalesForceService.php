<?php

namespace App\Services\SalesForce;

use App\Exceptions\SalesforceException;

class SalesForceService {

    private $apiParameters;

    //@TODO: What is this?
    private $user_id;

    private $debug = false;

    public function __construct(SalesForceApiParameters $apiParameters, $token = null){

        $this->debug = config('app.debug');

        $this->apiParameters = $apiParameters;

        if($token){
            $this->setToken($token);
        }
    }

    public function setToken($token) {

        $this->apiParameters
            ->setAccessToken($token->token)
            ->setInstanceUrl($token->data['instance_url']);

        //@TODO: What is this:
        $this->user_id = array_slice(explode('/id/', $token->data['id']), -1)[0];
    }

    public function hasToken(){
        return (bool)$this->access_token;
    }

    public function apiUrl($method = ''){
        return $this->instance_url . $this->version . '/' . ltrim($method, '/');
    }


    public function call($type, $auth, $url, $data = [], $params = []){
        $contentType = $type == 'post' ? 'Content-type: application/x-www-form-urlencoded' : '';

        if(!empty($params['json'])){
            $contentType = 'Content-type: application/json';
        }
        $params = array_merge(
            [
                'options' => [
                    CURLOPT_HTTPHEADER => array_filter([
                        $contentType,
                        $auth == 'token' 
                            ? 'Authorization: Bearer ' . $this->access_token
                            : 'Authorization: Basic ' . base64_encode($this->client_id . ':' . $this->client_secret),
                    ]),
                ],
            ],
            $params
        );
        
        list($response, $http_code) = HttpService::$type($url, $data, $params);
        
        if($http_code >= 400){
            throw new SalesforceException( is_array($response) ? $response[0]['message'] : $response, $http_code );
        }

        return $response;
    }

    public function getVersions(){
        $url = $this->instance_url . '/services/data/';

        return $this->call('get', 'token', $url);
    }

    public function getResources(){
        $url = $this->apiUrl();
        return $this->call('get', 'token', $url);
    }

    public function getSobjects(){
        $url = $this->apiUrl('sobjects/');
        return $this->call('get', 'token', $url);
    }

    public function getUser($user_id = null){
        $url = $this->instance_url . '/id/' . ($user_id ?: $this->user_id);
        return $this->call('get', 'token', $url);
    }

}
