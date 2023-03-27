<?php

namespace AnthonyEdmonds\GovukLaravel\Controllers;

use AnthonyEdmonds\GovukLaravel\Forms\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class FormController extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    public function start(string $formKey): View
    {
        $form = Form::getForm($formKey);
        $form->checkAccess();

        return $form->start();
    }

    public function create(string $formKey): RedirectResponse
    {
        $form = Form::getForm($formKey);
        $form->checkAccess();

        return $form->create();
    }

    public function edit(string $formKey, int|string $subjectKey): RedirectResponse
    {
        $form = Form::getForm($formKey);
        $form->checkAccess();

        return $form->edit($subjectKey);
    }

    public function question(string $formKey, string $mode, string $questionKey): View
    {
        $form = Form::getForm($formKey);
        $form->checkAccess();

        return $form->question($mode, $questionKey);
    }

    public function store(Request $request, string $formKey, string $mode, string $questionKey): RedirectResponse
    {
        $form = Form::getForm($formKey);
        $form->checkAccess();

        return $form->store($request, $mode, $questionKey);
    }

    public function summary(string $formKey, string $mode): View
    {
        $form = Form::getForm($formKey);
        $form->checkAccess();

        return $form->summary($mode);
    }

    public function submit(string $formKey, string $mode): RedirectResponse
    {
        $form = Form::getForm($formKey);
        $form->checkAccess();

        return $form->submit($mode);
    }

    public function confirmation(string $formKey, string $mode, string $subjectKey): View
    {
        $form = Form::getForm($formKey);
        $form->checkAccess();

        return $form->confirmation($mode, $subjectKey);
    }
}
