<?php

namespace App\Http\Controllers;

use App\Forms\CategoryForm;
use App\categories;
use App\questions;
use App\note;
use App\person;
use App\person_question;
use App\note_question;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Field;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $categories = categories::with(['questions', 'questions.notes', 'questions.people'])->get();
        return view('Category.index')
        ->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Forms\CategoryForm::class, [
            'method' => 'POST',
            'url' => route('category.store'),
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


        categories::create([
            'id' => ((integer)(categories::all()->count())) + 1,
            'title' => $request->title,
            'description' => $request->description
        ]);

        flash('La categorie ' . $request->title . ' à été créée avec succès');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
       // dd($id);



        $category = categories::where('id', $id)->get();

        //dd($category);

        //dd(categories::where('id', $question[0]->categories_id)->get());
        //dd((categories::where('id', $question[0]->categories_id)->get())[0]->title);



        return view('Category.edit', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormBuilder $formBuilder, $id)
    {
        $category = categories::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        flash("la categorie " . $request->title . " a bien été modifié");

        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {


        $category = categories::where('id', $id)->get();

        note_question::join('questions', 'note_questions.questions_id', '=', 'questions.id')->where('categories_id', $id)->delete();
        note::join('note_questions', 'notes.id', "=", 'note_questions.note_id')->join('questions', 'note_questions.questions_id', '=', 'questions.id')->where('categories_id', $id)->delete();

        person_question::join('questions', 'person_questions.questions_id', '=', 'questions.id')->where('categories_id', $id)->delete();
        person::join('person_questions', 'people.id', '=', 'person_questions.person_id')->join('questions', 'person_questions.questions_id', '=', 'questions.id')->where('categories_id', $id)->delete();

        categories::where('id', $id)->delete();
        questions::where('categories_id', $id)->delete();
        foreach(categories::where('id', '>', $id)->get() as $value){
            $value->id = $value->id - 1;
            $value->save();
        }
        foreach (questions::where('categories_id', '>', $id)->get() as $value) {
            $value->categories_id = $value->categories_id - 1;
            $value->save();
        }



        flash('La categorie ' . $category[0]->title . ' à été supprimée avec succès');

        return redirect(route('category.index'));
    }
}
