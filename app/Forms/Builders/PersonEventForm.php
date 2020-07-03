<?php

namespace App\Forms\Builders;

use App\PersonEvent;
use LaravelEnso\Forms\App\Services\Form;

class PersonEventForm
{
    protected const TemplatePath = __DIR__.'/../Templates//personEvent.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(PersonEvent $personEvent)
    {
        return $this->form->edit($personEvent);
    }
}
