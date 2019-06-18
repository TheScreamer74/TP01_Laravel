<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forms\CategoryForm;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\Field;

class ContactController extends Controller
{
    public function index(FormBuilder $formBuilder)
    {

    	$form = $formBuilder->create(\App\Forms\ContactForm::class, [
            'method' => 'POST',
            'url' => route('contact.store'),
        ]);

        return view('Contact.index', compact('form'));
    }

    public function store(Request $request)
    {
        dd("CONFIGURER LE SERVICE EMAIL");
    }
}
