@props(['dataValue', 'active', 'buttonText' => $buttonText ?? ''])

<button class="tab-btn {{ $active }}" data-value="{{ \Str::slug($dataValue) }}">
    @if ($slot->isEmpty())
        {{ $buttonText }}
    @else
        {{ $slot }}
    @endif
</button>
