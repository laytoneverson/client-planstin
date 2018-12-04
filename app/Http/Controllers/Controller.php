<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as LaravelController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends LaravelController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $this->setupView();
        $this->initialize();

    }

    public function initialize(){ }


    public function setupView(){
        $this->view = (object) [];
    }
    public function view($path, $args = []){
        return view($path, $this->makeView($args));
    }
    public function makeView($args = []){
        return array_merge(['controller' => $this, 'message' => session('message')], (array) $this->view, $args);
    }

    public function error($message){
        if($this->request->ajax()){
            return ['status' => 'failed', 'message' => $message];
        }else{
            return abort(404, $message);
        }
    }
}
