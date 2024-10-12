{{-- resources/views/components/links/buttonLink.blade.php --}}
@props([
'href', // The URL for the link
'size', // Available sizes: sm, base, lg
'variant', // Available variants: primary, success, danger, warning, outline-primary, etc.
'leftIcon', // Left icon component
'rightIcon', // Right icon component
'leftIconClass', // Additional class for left icon
'rightIconClass', // Additional class for right icon
'class' => '', // Additional CSS classes for the link
])

@php
// Button size classes
$sizeClasses = [
'lg' => 'text-lg md:text-xl min-h-[28px] py-1 px-2 md:min-h-[48px] md:py-3 md:px-[26px]',
'base' => 'text-sm md:text-base min-h-[24px] py-0.5 px-1 md:min-h-[40px] md:py-2 md:px-[22px]',
'sm' => 'text-xs md:text-sm min-h-[22px] py-[1px] px-[3px] md:min-h-[34px] md:py-1 md:px-[18px]',
];

// Button variant classes
$variantClasses = [
'primary' => 'border text-neutral-10 bg-primary-main hover:bg-primary-hover focus:bg-primary-main
focus:border-primary-border active:bg-primary-pressed active:border-neutral-100',
'success' => 'border text-neutral-10 bg-success-main hover:bg-success-hover focus:bg-success-main
focus:border-success-border active:bg-success-pressed active:border-neutral-100',
'danger' => 'border text-neutral-10 bg-danger-main hover:bg-danger-hover focus:bg-danger-main focus:border-danger-border
active:bg-danger-pressed active:border-neutral-100',
'warning' => 'text-neutral-10 bg-warning-main hover:bg-warning-hover focus:bg-warning-main focus:ring-warning-border
focus:ring active:bg-warning-pressed',
'outline-primary' => 'text-primary-main border border-primary-main bg-transparent hover:bg-primary-focus
active:shadow-inner',
'outline-success' => 'text-success-main border border-success-main bg-transparent hover:bg-success-focus
active:shadow-inner',
'outline-danger' => 'text-danger-main border border-danger-main bg-transparent hover:bg-danger-focus
active:shadow-inner',
];

// Determine if the link should open in a new tab
$isNewTab = $openNewTab ?? (!str_starts_with($href, '/') && !str_starts_with($href, '#'));

// Combine button classes
$buttonClasses = implode(' ', [
'inline-flex items-center justify-center rounded-md md:rounded-lg transition-colors duration-75 focus:outline-none
focus-visible:ring focus-visible:ring-primary-500 h-fit',
$sizeClasses[$size] ?? $sizeClasses['base'],
$variantClasses[$variant] ?? $variantClasses['primary'],
$class, // Include additional classes
]);
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $buttonClasses]) }}
    @if($isNewTab) target="_blank" rel="noopener noreferrer" @endif
    >
    {{-- Left Icon --}}
    @if($leftIcon)
    <x-dynamic-component :component="$leftIcon" class="mr-2 {{ $leftIconClass }} w-5 md:w-6" />
    @endif

    {{-- Button Text --}}
    {{ $slot }}

    {{-- Right Icon --}}
    @if($rightIcon)
    <x-dynamic-component :component="$rightIcon" class="ml-2 {{ $rightIconClass }} w-5 md:w-6" />
    @endif
</a>
