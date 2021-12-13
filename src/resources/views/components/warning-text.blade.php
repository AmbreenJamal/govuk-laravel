@props([
    'label' => 'Warning'
])

<div class="govuk-warning-text">
    <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
    <strong class="govuk-warning-text__text">
        <span class="govuk-warning-text__assistive">{{ $label }}</span>
        {{ $slot }}
    </strong>
</div>
