<?php

namespace App\Http\Controllers;

use App\Forms\CategoryForm;
use App\categories;
use App\questions;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

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
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {



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

      

        return redirect(route('category.index'));
    }
}
