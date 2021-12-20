@props([
    'height' => null,
    'heading' => null,
    'links' => [],
    'logo' => null,
    'width' => null,
])

<div class="govuk-footer__meta">
    <div class="govuk-footer__meta-item govuk-footer__meta-item--grow">
        @if($heading !== null)
            <h2 class="govuk-visually-hidden">{{ $heading }}</h2>
        @endif

        @if(empty($links) === false)
            <ul class="govuk-footer__inline-list">
                @foreach($links as $label => $link)
                    @can($link['can'] ?? null)
                        <li class="govuk-footer__inline-list-item">
                            <a
                                class="govuk-footer__link"
                                href="{{ route($link['route'] ?? $link) }}"
                                target="{{ $link['blank'] ?? false === true ? '_blank' : '_self' }}"
                            >
                                {{ $label }}
                            </a>
                        </li>
                    @endcan
                @endforeach
            </ul>
        @endif

        <div class="govuk-footer__meta-custom">
            {{ $information }}
        </div>

        <x-govuk::footer.licence
            :height="$height"
            :logo="$logo"
            :width="$width"
        >
            {{ $licence }}
        </x-govuk::footer.licence>
    </div>

    <div class="govuk-footer__meta-item">
        {{ $logos }}
    </div>
</div>
