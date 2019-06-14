<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class QuestionForm extends Form
{
    public function buildForm()
    {
        $array = array();
        foreach ((\App\categories::all(['title'])->toArray()) as $cat => $title) {

                    $array[$cat] = $title['title'];
        }



        $this
            ->add('title', 'text', [
            	'rules' => 'required'
            ])
            ->add('descritpion', 'textarea', [
            	'rules' => 'required'
            ])
            ->add('categorie', 'select', [
            	'choices' => $array,
            	'empty_value' => 'Choisissez une categorie',
            	'rules' => 'required'
            ])
            ->add('Envoyer', 'submit');

        
    }
}
