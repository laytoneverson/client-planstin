<?php 
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

class BaseController extends Controller {
    public $includes = [
        'head' => 'includes.head',
        'header' => 'includes.header-company',
        'sidebar' => 'includes.sidebar-company',
        'body' => 'includes.body-company',
    ];
}