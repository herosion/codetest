<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Question;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   	protected $nbPaginate;

    public function __construct(){

        $this->nbPaginate = env('NUMBER_PAGINATE');

        view()->composer('partials.header', function($view){
  
        $categories = DB::table('categories')->select('name', 'id', 'slug')->get();
        $admin = Auth::user();

        $view->with('categories', $categories);
        $view->with('admin', $admin);

        });

        view()->composer('partials.sidenav', function($view){
 
        $admin = Auth::user();
        $view->with('admin', $admin);

        $nbQuestion = Question::all();
        $view->with('nbQuestion', $nbQuestion);

        });
    }
}
