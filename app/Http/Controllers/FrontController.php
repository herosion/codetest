<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

        $questions = Question::Status()->latest('date')->paginate($this->nbPaginate);

    	return view('front.index', compact('questions'));
    }

    public function showQuestionsByCat(int $id, string $slug = null){

    	$questions = Category::find($id)->questions()->latest('date')->paginate($this->nbPaginate);

    	$category = Category::find($id);

    	return view('front.category', compact('questions', 'category'));
    }

    public function showQuestion(int $id){
    	
    	$question = Question::find($id);
        
        return view('front.single', compact('question'));
    }
}
