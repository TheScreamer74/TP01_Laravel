<?php

namespace App\Http\Controllers;

use App\Forms\CategoryForm;
use App\categories;
use App\questions;
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

        
        $categories = categories::with('questions')->get();
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
        $form = $formBuilder->create(CategoryForm::class);

        if(!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }


        categories::create([
            'id' => ((integer)(categories::all()->count())) + 1,
            'title' => $request->title,
            'description' => $request->descritpion
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

        $form = $formBuilder->createByArray([
            [
                'name' => 'title',
                'type' => Field::TEXT,
                'value' => $category[0]->title,
                'rules' => 'required'
            ],
            [
                'name' => 'description',
                'type' => Field::TEXTAREA,
                'value' => $category[0]->description,
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
            'url' => route('category.update', $category[0]->id)
        ]);



        return view('Category.edit', ['category' => $category, 'form' => $form]);

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
