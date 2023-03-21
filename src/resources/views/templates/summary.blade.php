@extends('govuk::layout.page')

@section('main')
    <x-govuk::summary-list :list="$summary" />

    <x-govuk::form action="{{ $action }}" method="{{ $method }}">
        <x-govuk::button-group>
            <x-govuk::button :type="$submitButtonType">
                {{ $submitButtonLabel }}
            </x-govuk::button>

            @include('govuk::parts.other-button')
        </x-govuk::button-group>
    </x-govuk::form>
@endsection
