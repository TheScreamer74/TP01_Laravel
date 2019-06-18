<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
            	'rules' => 'required'
            ])

            ->add('descritpion', 'textarea', [
            	'rules' => 'required'
            ])

            ->add('addField', 'button', [
                'attr' => ['onclick' => 'addField(this.parentNode)']
            ])

            ->add('Envoyer', 'submit', [
                'attr' => ['id' => 'button submit']
            ]);
    }
}
