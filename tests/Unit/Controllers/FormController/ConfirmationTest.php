<?php

namespace AnthonyEdmonds\GovukLaravel\Tests\Unit\Controllers\FormController;

use AnthonyEdmonds\GovukLaravel\Controllers\FormController;
use AnthonyEdmonds\GovukLaravel\Forms\Form;
use AnthonyEdmonds\GovukLaravel\Tests\Forms\TestForm;
use AnthonyEdmonds\GovukLaravel\Tests\Models\FormModel;
use AnthonyEdmonds\GovukLaravel\Tests\Models\User;
use AnthonyEdmonds\GovukLaravel\Tests\TestCase;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;

class ConfirmationTest extends TestCase
{
    protected FormController $controller;
    protected FormModel $subject;
    protected User $user;
    protected View $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->useForms();
        $this->useDatabase();

        $this->user = new User();
        $this->signIn($this->user);

        $this->subject = FormModel::factory()->create();

        $this->controller = new FormController();
    }

    public function testChecksAccess(): void
    {
        $this->expectException(AuthorizationException::class);
        $this->expectExceptionMessage('This action is unauthorized');

        $this->makeRequest(false);
    }

    public function testHasTemplate(): void
    {
        $this->makeRequest();

        $this->assertEquals(
            'test.confirmation',
            $this->response->name(),
        );
    }

    protected function makeRequest(bool $allow = true): void
    {
        $this->user->allow = $allow;

        $this->response = $this->controller->confirmation(
            TestForm::key(),
            Form::NEW,
            $this->subject->id,
        );
    }
}
