<?php

namespace AnthonyEdmonds\GovukLaravel\Forms;

use AnthonyEdmonds\GovukLaravel\Helpers\GovukPage;
use AnthonyEdmonds\GovukLaravel\Questions\Question;
use Illuminate\Contracts\View\View;

abstract class FormStep implements View
{
    public const KEY = 'form-step';
    public const BLADE = null;
    public const BUTTON_LABEL = 'Continue';
    public const TITLE = null;

    protected Form $form;
    protected array $withs;

    // Construction
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    // Question
    abstract public function question(): array|Question;

    abstract public function store(): void;

    abstract public function update(): void;

    // Actions
    protected function submitRoute(): string
    {
        // TODO if existing

        return true
            ? route('govuk-form.update', [
                $this->form::KEY,
                $this::KEY
            ])
            : route('govuk-form.store', [
                $this->form::KEY,
                $this::KEY
            ]);
    }

    protected function submitMethod(): string
    {
        // TODO If new POST, if existing PUT

        return true
            ? 'PUT'
            : 'POST';
    }

    protected function backRoute(): string
    {
        return $this->form->previousRoute();
    }

    // View Contract
    public function render(): View
    {
        $question = $this->question();

        return $question instanceof Question === true
            ? GovukPage::question(
                $question,
                static::BUTTON_LABEL,
                $this->submitRoute(),
                $this->backRoute(),
                $this->submitMethod(),
                static::BLADE,
            )
            : GovukPage::questions(
                static::TITLE,
                $question,
                static::BUTTON_LABEL,
                $this->submitRoute(),
                $this->backRoute(),
                $this->submitMethod(),
                static::BLADE,
            );
    }

    public function name(): string
    {
        return static::KEY;
    }

    public function with($key, $value = null): static
    {
        $this->withs[$key] = $value;
        return $this;
    }

    public function getData(): array
    {
        return array_merge(
            [],
            $this->withs
        );
    }
}
