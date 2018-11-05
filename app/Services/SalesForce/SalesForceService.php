<?php

namespace App\Services\SalesForce;

use App\Exceptions\SalesforceException;

class SalesForceService {
    var $client_id;
    var $client_secret;
    var $redirect_uri;
    var $auth_endpoint;
    var $env;

    var $instance_url;
    var $version = '/services/data/v43.0';
    var $user_id;
    var $access_token;

    var $debug = false;

    public function __construct($token = null){
        $this->env = \Config::get('app.salesforce.env');

        $this->client_id = \Config::get('app.salesforce.client_id');
        $this->client_secret = \Config::get('app.salesforce.client_secret');
        $this->redirect_uri = \Config::get('app.salesforce.redirect_uri');
        $this->auth_endpoint = \Config::get("app.salesforce.endpoints.{$this->env}");
    
        if($token){
            $this->access_token = $token->token;
            $this->instance_url = $token->data['instance_url'];
            $this->user_id = array_slice(explode('/id/', $token->data['id']), -1)[0];
        }
    }
    public function hasToken(){
        return !!$this->access_token;
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
    public function getAuthUrl(){
        /**
         * https://login.salesforce.com/services/oauth2/authorize
         *      ?response_type=code
         *      &client_id=3MVG9lKcPoNINVBIPJjdw1J9LLM82HnFVVX19KY1uA5mu0QqEWhqKpoW3svG3XHrXDiCQjK1mdgAvhCscA9GE
         *      &redirect_uri=https%3A%2F%2Fwww.mysite.com%2Fcode_callback.jsp&state=mystate
         */

        return $this->auth_usrl = "{$this->auth_endpoint}/services/oauth2/authorize".
            "?response_type=code".
            "&client_id={$this->client_id}".
            "&redirect_uri=". urlencode($this->redirect_uri);
    }

    public function refreshAccessToken($refresh){
        /**
         * POST /services/oath2/token HTTP/1.1
         * Host: login.salesforce.com
         * Authorization:  Basic client_id=3MVG9lKcPoNINVBIPJjdw1J9LLM82HnFVVX19KY1uA5mu0QqEWhqKpoW3svG3XHrXDiCQjK1mdgAvhCscA9GE&client_secret=1955279925675241571
         * grant_type=refresh_token&refresh_token=your token here 
         */

        $post = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh,
        ];

        return $this->call('post', 'client', "$this->auth_endpoint/services/oauth2/token", $post);
        
    }
    public function requestAccessToken($code){
        /**
         *  POST /services/oauth2/token HTTP/1.1
         *   Host: login.salesforce.com 
         *   grant_type=authorization_code
         *   &code=aPrxsmIEeqM9PiQroGEWx1UiMQd95_5JUZVEhsOFhS8EVvbfYBBJli2W5fn3zbo.8hojaNW_1g%3D%3D
         *   &client_id=3MVG9lKcPoNINVBIPJjdw1J9LLM82HnFVVX19KY1uA5mu0QqEWhqKpoW3svG3XHrXDiCQjK1mdgAvhCscA9GE
         *   &client_secret=1955279925675241571&
         *   redirect_uri=https%3A%2F%2Fwww.mysite.com%2Fcode_callback.jsp
         */

        $post = [
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->redirect_uri,
        ];

        return $this->call('post', 'client', "{$this->auth_endpoint}/services/oauth2/token", $post);
    }
}
