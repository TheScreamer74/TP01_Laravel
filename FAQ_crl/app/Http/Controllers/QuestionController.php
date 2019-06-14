<?php

namespace App\Http\Controllers;

use App\Forms\QuestionForm;
use App\questions;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Field;

class QuestionController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Forms\QuestionForm::class, [
            'method' => 'POST',
            'url' => route('question.store'),
        ]);

        return view('Category.create', compact('form')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {
      $form = $formBuilder->create(QuestionForm::class);

      if(!$form->isValid()) {
        return redirect()->back()->withErrors($form->getErrors())->withInput();
      }



      questions::create([
        'title' => $request->title,
        'description' => $request->descritpion,
        'categories_id' => (integer)$request->categorie + 1
      ]);

      return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(questions $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {

        $question = questions::where('id', $id)->get();


        $form = $formBuilder->createByArray([
            [
                'name' => 'title',
                'type' => Field::TEXT,
                'value' => $question[0]->title,
            ],
            [
                'name' => 'description',
                'type' => Field::TEXTAREA,
                'value' => $question[0]->description,
            ],
            [
                'name' => 'Modifier',
                'type' => Field::BUTTON_SUBMIT,
                'value' => 'Modifier'
            ]
        ]
        ,[
            'method' => 'POST',
            'url' => route('question.update', '$question->id')
        ]);

        


        return view('Category.edit', ['question' => $question, 'form' => $form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, questions $questions)
    {
        dd("update question");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(questions $questions)
    {
        //
    }
}
