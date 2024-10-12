{{-- resources/views/components/buttons/iconButton.blade.php --}}
@props([
'variant', // primary, success, danger, outline-primary, etc.
'size', // sm, base, lg
'icon', // Icon component name
'iconClass', // Additional class for the icon
'disabled', // Disabled state
])

@php
// Button size classes
$sizeClasses = [
'lg' => 'text-base md:text-lg min-h-[28px] min-w-[28px] p-2 md:min-h-[48px] md:min-w-[48px] md:p-2.5',
'base' => 'text-sm md:text-base min-h-[24px] min-w-[24px] p-1 md:min-h-[40px] md:min-w-[40px] md:p-1.5',
'sm' => 'text-xs md:text-sm min-h-[22px] min-w-[22px] p-[0.5px] md:min-h-[36px] md:min-w-[36px] md:p-1',
];

// Button variant classes
$variantClasses = [
'primary' => 'border text-white bg-primary-main hover:bg-primary-hover active:bg-primary-pressed disabled:bg-neutral-30
disabled:text-neutral-70',
'success' => 'border text-white bg-success-main hover:bg-success-hover active:bg-success-pressed disabled:bg-neutral-30
disabled:text-neutral-70',
'danger' => 'border text-white bg-danger-main hover:bg-danger-hover active:bg-danger-pressed disabled:bg-neutral-30
disabled:text-neutral-70',
'outline-primary' => 'text-primary-main border border-primary-main bg-transparent hover:bg-primary-focus
disabled:bg-transparent disabled:border-neutral-30 disabled:text-neutral-70',
'outline-success' => 'text-success-main border border-success-main bg-transparent hover:bg-success-focus
disabled:bg-transparent disabled:border-neutral-30 disabled:text-neutral-70',
'outline-danger' => 'text-danger-main border border-danger-main bg-transparent hover:bg-danger-focus
disabled:bg-transparent disabled:border-neutral-30 disabled:text-neutral-70',
];

// Disabled state classes
$disabledClass = $disabled ? 'disabled:cursor-not-allowed' : '';

// Combine final button classes
$buttonClasses = implode(' ', [
'inline-flex items-center justify-center font-semibold h-fit',
'focus:outline-none focus-visible:ring focus-visible:ring-primary-500',
'transition duration-100',
'rounded-lg',
$sizeClasses[$size] ?? $sizeClasses['base'],
$variantClasses[$variant] ?? $variantClasses['outline-primary'],
$disabledClass,
$attributes->get('class'), // Allow additional classes passed from the usage
]);
@endphp

<button type="button" {{ $attributes->merge(['class' => $buttonClasses]) }}
    @if($disabled) disabled @endif
    >
    {{-- Render the icon if provided --}}
    @if($icon)
    <x-dynamic-component :component="$icon" class="w-5.5 h-5.5 md:w-6 md:h-6 {{ $iconClass }}" />
    @endif
</button>
