{{-- resources/views/components/links/unstyledLink.blade.php --}}
@props([
'href', // The URL for the link
'openNewTab', // Determines whether to open in a new tab
'class', // Additional CSS classes
])

@php
// Determine if the link should open in a new tab
$isNewTab = $openNewTab ?? (!str_starts_with($href, '/') && !str_starts_with($href, '#'));
@endphp

{{-- Internal or hash links --}}
<a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }} @if($isNewTab) target="_blank" rel="noopener
    noreferrer" @endif>
    {{ $slot }}
</a>
