<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ContactForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('email', 'email', [
            	'rules' => 'required'
            ])

            ->add('Votre problème', 'text', [
            	'rules' => 'required'
            ])

            ->add('Descritpion','textarea', [
                'rules' => 'required'
            ])

            ->add('Envoyer', 'submit');
    }
}
