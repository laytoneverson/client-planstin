<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as LaravelController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

//custom
use Illuminate\Http\Request;
use App\App;
use App\Exceptions\ControllerException;

class Controller extends LaravelController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $template;

    public $request;

    public $route;

    public $includes = [
        'head' => 'includes.head',
        'header' => 'includes.header',
        'footer' => 'includes.footer',
        'sidebar' => 'includes.sidebar',
        'body' => 'includes.body',
    ];

    public function __construct($mvc){
        $this->mvc = $mvc;
        $this->request = $mvc->request;
        $this->route = $mvc->route;

        $this->includes = (object) $this->includes;

    	App::setRequest($mvc->request);
        App::setController($this);

        $this->setupParameters();
        $this->setupView();


        $site_meta = [
            'type' => 'website',
            'site_name' => \Config::get('app.name'),
            'description' => \Config::get('app.description'),
            'title' => (
                $this->route->controller != 'Main' 
                    ? $this->route->controller . ' '
                    : 'Home'
                )
                . (
                    $this->route->method != 'home'
                        ? ucfirst($this->route->method)
                        : ''
                )
                . ' - ' 
                . \Config::get('app.name'),
            'image' => url('/') . \Config::get('app.logo'),
        ];

        $url = '/' . trim(str_replace( url('/'), '', url()->current() ), '/');

        $this->view->current_url = $url;

        \App\Utils\SocialMarkup::setSiteTags($site_meta);
        

        $this->initialize();
    }

    public function initialize(){ }

    public function setupParameters(){
        $this->params = (object) ($this->request->route() !== null ? $this->request->route()->parameters() : []);

        $all = $this->request->all();

        $get = (array) $_GET;
        $post = (array) $_POST;

        foreach($all as $key => $val){
            if($this->request->isMethod('post') && !isset($get[$key])){
                $post[$key] = $val;
            }
        }

        $this->get = (object) $get;
        $this->post = (object) $post;
    }
    public function setupView(){
        $this->view = (object) [
            'includes' => $this->includes,
            'controller' => $this,
        ];
    }

    public function view($path, $args = []){
        return view($path, $this->makeView($args));
    }

    public function makeView($args = []){
        return array_merge( (array) $this->view, $args);
    }

    public function error($message, $code = 404){
        throw new ControllerException($message, $code);
    }
    
    public function authorizeToken(){ 
        if(!App::checkSessionToken()){
            try{
                App::authorizeAndSetToken();
            }catch(\Exception $e){
                if( !session('error') ){
                    throw new ControllerException('Site Currently Unavailable. Please try again later', 300);
                }
            }
        }
    }

}
