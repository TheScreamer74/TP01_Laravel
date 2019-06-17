<?php

namespace App\Http\Controllers;

use App\Forms\QuestionForm;
use App\questions;
use App\categories;
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

        return view('Question.create', compact('form')); 
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

      flash('La question ' . $request->title . ' à été créée avec succès');

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

        $array = array();
        foreach ((categories::all(['title'])->toArray()) as $cat => $title) {

                    $array[$cat] = $title['title'];
        }


        dump($array);
        //dd(categories::where('id', $question[0]->categories_id)->get());
        //dd((categories::where('id', $question[0]->categories_id)->get())[0]->title);

        $form = $formBuilder->createByArray([
            [
                'name' => 'title',
                'type' => Field::TEXT,
                'value' => $question[0]->title,
                'rules' => 'required'
            ],
            [
                'name' => 'description',
                'type' => Field::TEXTAREA,
                'value' => $question[0]->description,
                'rules' => 'required'
            ],
            [
                'name' => 'category',
                'type'=> 'select',
                'choices' => $array,
                'selected' => $question[0]->categories_id - 1,
                'empty_value' => 'Choisissez une categorie',
                'rules' => 'required'
            ],
            [
                'name' => 'Modifier',
                'type' => Field::BUTTON_SUBMIT,
                'value' => 'Modifier'
            ]
        ]
        ,[
            'method' => 'POST',
            'url' => route('question.update', $question[0]->id )
        ]);

        


        return view('Question.edit', ['question' => $question, 'form' => $form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dump($request);
      //  dump($request->category);

      //  dump(questions::where('id', $id)->get());

        questions::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'categories_id' => (integer)$request->category + 1,
        ]);

        

       // dd(questions::where('id', $id)->get());

        flash("L'article " . $request->title . ' a bien été modifié');

        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

        $question = questions::where('id', $id)->get();

        questions::where('id', $id)->delete();

        flash('La question ' . $question[0]->title . 'à été supprimée avec succès');

        return redirect(route('category.index'));
    }
}
