@props([
    'autocomplete' => 'on',
    'count' => false,
    'hint' => null,
    'id' => $name,
    'inputmode' => 'text',
    'label',
    'labelSize' => 's',
    'name',
    'placeholder' => null,
    'rows' => 5,
    'spellcheck' => 'false',
    'threshold' => false,
    'title' => false,
    'value' => null,
    'words' => false,
])

@php
    $ariaDescription = '';
    $inputClasses = 'govuk-textarea';

    if ($hint !== null) {
        $ariaDescription .= "{$id}-hint";
    }

    if ($count !== false || $words !== false) {
        $inputClasses .= ' govuk-js-character-count';
    }

    if ($errors->has($name) === true) {
        $ariaDescription .= " {$id}-error";
        $inputClasses .= ' govuk-textarea--error';
    }
@endphp

<x-form-group
    :count="$count"
    :hint="$hint"
    :id="$id"
    :label="$label"
    :label-size="$labelSize"
    :name="$name"
    :threshold="$threshold"
    :title="$title"
    :words="$words"
>
    <textarea
        aria-describedby="{{ $ariaDescription }}"
        autocomplete="{{ $autocomplete }}"
        class="{{ $inputClasses }}"
        id="{{ $id }}"
        inputmode="{{ $inputmode }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        rows="{{ $rows }}"
        spellcheck="{{ $spellcheck == true ? 'true' : 'false' }}"
    >{{ old($name, $value) }}</textarea>
</x-form-group>
