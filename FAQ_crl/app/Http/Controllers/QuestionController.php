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
    public function create(FormBuilder $formBuilder, $id = null)
    {
        $array = array();
        foreach ((\App\categories::all(['title'])->toArray()) as $cat => $title) {

                    $array[$cat] = $title['title'];
        }

        return view('Question.create', compact('array'), compact('id')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {
        //dd($request);

        $length = strlen($request->description);
        for ($i = 0; $i< $length; $i++) {
            if($i%50 == 49){
                $request->description = substr_replace($request->description, "\n", $i, 0);
            }
        }

        if($request->personne != null){
            $request->description = $request->description . "\n" . "\r" . "\t" ."Personne Lié au document : ". "\n" . "\r";    
        
        
           foreach ($request->personne as $value) {
                $request->description = $request->description . "\t" . "\t-" . $value . "\n";
            }
        }

        if($request->notes !=null){
            $request->description = $request->description . "\n" . "\r" . "\t" ."Notes Importantes : ". "\n" . "\r"; 
            
            foreach ($request->notes as $value) {
                $request->description = $request->description . "\t" . "\t-" . $value . "\n";
            }  
        }

        //dd($request->description);
        

      questions::create([
        'title' => $request->title,
        'description' => $request->description,
        'categories_id' => (integer)$request->categories + 1
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


        //dump($array);
        //dd(categories::where('id', $question[0]->categories_id)->get());
        //dd((categories::where('id', $question[0]->categories_id)->get())[0]->title);

        return view('Question.edit', ['question' => $question, 'array' => $array]);
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
