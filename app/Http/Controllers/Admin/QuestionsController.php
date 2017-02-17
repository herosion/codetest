<?php

namespace App\Http\Controllers\Admin;

use App\Question;
use App\Category;
use Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dashboard view
        $questions = Question::latest('date')->paginate($this->nbPaginate);

        return view('back.question.index', compact('questions', 'nbQuestion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id'); 
  
        return view('back.question.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {

        $question = Question::create( $request->all() );

        session()->flash('flashMessage', 'Question bien ajoutée');

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $categories = Category::pluck('name', 'id');

        return view('back.question.edit', compact('question', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $question = Question::find($id);

        if(!empty($request->status)) 
        {
            $question->status =  'published';
        }else{

            $question->status = 'unpublished';
        }

        $question->update( $request->all() );
        /*dump($request->status); die;*/
        session()->flash('flashMessage', 'Mise à jour réussie');

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $exitCode = Artisan::call('cache:clear');
         
        Question::destroy($id);
        
       
        //Flashmessage de confirmation
        session()->flash('flashMessage', 'Question supprimée');
        //Redirection sur l'index
        return redirect()->route('admin.index');
    }
}
