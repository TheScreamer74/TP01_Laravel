<?php

namespace App\Http\Controllers;

use App\Forms\QuestionForm;
use App\questions;
use App\categories;
use App\note;
use App\person;
use App\person_question;
use App\note_question;
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
        $people = array();
        $notes = array();
        questions::create([
            'title' => $request->title,
            'description' => $request->description,
            'categories_id' => (integer)$request->categories + 1
        ]);

        if($request->personne != null){
            foreach ($request->personne as $key => $value) {   
                person::create([
                    'name' => $value['name'],
                    'desc' => $value['desc']
                ]);
                $people[$key] = person::all()->last();
            }
            foreach ($people as $value) {
                person_question::create([ 
                    'person_id' => $value['id'],
                    'questions_id' => (integer)(questions::all()->last()->id)
                ]);
            }
        }   

       

        if($request->notes !=null){
            foreach ($request->notes as $key => $value) {
               
               note::create([
                    'title' => $value['titre'],
                    'desc' => $value['desc']
               ]);
               $notes[$key] = note::all()->last();
            }
            foreach ($notes as $value) {
                note_question::create([
                    'note_id' => $value['id'],
                    'questions_id' =>(integer)(questions::all()->last()->id)
                ]);
            }
        }

        //dd($request->description);

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


        $question = questions::where('id', $id)->with(['notes', 'people'])->get();

        

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
      //  dump($request->category);

      //  dump(questions::where('id', $id)->get());

        

        $questions = questions::where('id', $id)->with('notes')->get();
            


        foreach($questions[0]->notes as $note){
            note::where('id', $note->id)->delete();
            note_question::where('note_id', $note->id)->delete();
        }

        foreach($questions[0]->people as $person){
            person::where('id', $person->id)->delete();
            note_question::where('note_id', $person->id)->delete();
        }
        

        questions::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'categories_id' => (integer)$request->category + 1,
        ]);


        if($request->notes !=null){
            foreach ($request->notes as $key => $value) {
               
               note::create([
                    'title' => $value['titre'],
                    'desc' => $value['desc']
               ]);
               $notes[$key] = note::all()->last();
            }
            foreach ($notes as $value) {
                note_question::create([
                    'note_id' => $value['id'],
                    'questions_id' =>(integer)(questions::all()->last()->id)
                ]);
            }
        }

        if($request->personne != null){
            foreach ($request->personne as $key => $value) {   
                person::create([
                    'name' => $value['name'],
                    'desc' => $value['desc']
                ]);
                $people[$key] = person::all()->last();
            }
            foreach ($people as $value) {
                person_question::create([ 
                    'person_id' => $value['id'],
                    'questions_id' => (integer)(questions::all()->last()->id)
                ]);
            }
        }   



        

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
