<?php

namespace AnthonyEdmonds\GovukLaravel\Forms;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

abstract class Form
{
    const KEY = 'form';

    const TITLE = 'Form Title';

    const HAS_START_PAGE = true;
    const START_BUTTON_LABEL = 'Start';
    const START_BLADE = 'form.start';

    const HAS_SUMMARY_PAGE = true;
    const HAS_CONFIRMATION_PAGE = true;

    const SECTIONS = [];

    protected int $currentSection = 0;
    protected int $currentStep = 0;
    protected ?string $routeBase = null;

    // Construction
    public function __construct()
    {
        $this->loadFromSession();
        $this->setRouteBase();
    }

    // Routes
    public function firstStepRoute(): string
    {
        return $this->getRouteForStep(0, 0);
    }

    public function nextStepRoute(): string
    {
        // isAtEndOfSection

        return $this->getRouteForStep();
    }

    public function previousStepRoute(): string
    {
        // isAtStartOfSection

        return $this->getRouteForStep();
    }

    // Actions
    //abstract public function authorize(): bool;

    //abstract public function submit(): void;

    // Session
    public function clearFormProgress(): void
    {
        Session::forget(static::KEY);
    }

    public function saveFormProgress(): void
    {
        Session::put(static::KEY, [
            'currentSection' => $this->currentSection,
            'currentStep' => $this->currentStep,
            'routeBase' => $this->routeBase,
        ]);
    }

    // Utilities
    protected function loadFromSession(): void
    {
        if (Session::has(static::KEY) === true) {
            $formValues = Session::get(static::KEY);

            foreach ($formValues as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    protected function setRouteBase(): void
    {
        if ($this->routeBase === null) {
            $route = Route::currentRouteName();

            $this->routeBase = substr(
                $route,
                0,
                strrpos($route, '.')
            );
        }
    }

    protected function getRouteForStep(int $section, int $step): string
    {
        return route("$this->routeBase.create", [
            $this->getStep(0, 0)::KEY
        ]);
    }

    protected function getStep(int $section, int $step): FormStep
    {
        return static::SECTIONS[$section]->getStep($step);
    }
}
