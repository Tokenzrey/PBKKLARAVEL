{{-- resources/views/components/links/iconLink.blade.php --}}
@props([
'href', // The URL for the link
'size', // Available sizes: sm, base, lg
'variant', // Available variants: primary, success, danger, outline-primary, etc.
'icon', // Icon component
'iconClass', // Additional class for the icon
'class', // Additional CSS classes for the link
])

@php
// Button size classes
$sizeClasses = [
'lg' => 'text-lg md:text-xl min-h-[28px] py-1 px-2 md:min-h-[48px] md:py-2.5 md:px-6',
'base' => 'text-sm md:text-base min-h-[24px] py-0.5 px-1 md:min-h-[40px] md:py-2 md:px-3.5',
'sm' => 'text-xs md:text-sm min-h-[22px] py-[1px] px-[3px] md:min-h-[34px] md:py-1.5 md:px-2.5',
];

// Button variant classes
$variantClasses = [
'primary' => 'border text-neutral-10 bg-primary-main hover:bg-primary-hover focus:bg-primary-main
focus:border-primary-border active:bg-primary-pressed active:border-neutral-100',
'success' => 'border text-neutral-10 bg-success-main hover:bg-success-hover focus:bg-success-main
focus:border-success-border active:bg-success-pressed active:border-neutral-100',
'danger' => 'border text-neutral-10 bg-danger-main hover:bg-danger-hover focus:bg-danger-main focus:border-danger-border
active:bg-danger-pressed active:border-neutral-100',
'outline-primary' => 'text-primary-main border border-primary-main bg-transparent hover:bg-primary-focus
active:shadow-inner',
'outline-success' => 'text-success-main border border-success-main bg-transparent hover:bg-success-focus
active:shadow-inner ',
'outline-danger' => 'text-danger-main border border-danger-main bg-transparent hover:bg-danger-focus
active:shadow-inner',
];

// Determine if the link should open in a new tab
$isNewTab = $openNewTab ?? (!str_starts_with($href, '/') && !str_starts_with($href, '#'));

// Combine button classes
$buttonClasses = implode(' ', [
'h-fit inline-flex items-center justify-center font-semibold transition duration-100 focus:outline-none focus-visible:ring
focus-visible:ring-primary-500 rounded-lg',
$sizeClasses[$size] ?? $sizeClasses['base'],
$variantClasses[$variant] ?? $variantClasses['outline-primary'],
$class, // Include additional classes
]);
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $buttonClasses]) }} @if($isNewTab) target="_blank" rel="noopener
    noreferrer" @endif>
    {{-- Render the icon if provided --}}
    @if($icon)
    <x-dynamic-component :component="$icon" class="w-5.5 h-5.5 md:w-6 md:h-6 {{ $iconClass }}" />
    @endif
</a>
