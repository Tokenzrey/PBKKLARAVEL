{{-- resources/views/components/buttons/button.blade.php --}}

@php
// Map button size classes
$sizeClasses = [
'sm' => 'text-xs md:text-sm min-h-[22px] py-1 px-2 md:min-h-[34px] md:py-1 md:px-[18px]',
'base' => 'text-sm md:text-base min-h-[24px] py-0.5 px-1 md:min-h-[40px] md:py-2 md:px-[22px]',
'lg' => 'text-lg md:text-xl min-h-[28px] py-2 px-3 md:min-h-[48px] md:py-3 md:px-[26px]',
];

// Map button variant classes
$variantClasses = [
'primary' => 'border text-white bg-primary-main hover:bg-primary-hover disabled:bg-neutral-30 disabled:text-neutral-70',
'success' => 'border text-white bg-success-main hover:bg-success-hover disabled:bg-neutral-30 disabled:text-neutral-70',
'danger' => 'border text-white bg-danger-main hover:bg-danger-hover disabled:bg-neutral-30 disabled:text-neutral-70',
'warning' => 'text-white bg-warning-main hover:bg-warning-hover disabled:bg-neutral-30 disabled:text-neutral-70',
'outline-primary' => 'border border-primary-main text-primary-main bg-transparent hover:bg-primary-focus
disabled:border-neutral-30 disabled:text-neutral-70',
'outline-success' => 'border border-success-main text-success-main bg-transparent hover:bg-success-focus
disabled:border-neutral-30 disabled:text-neutral-70',
'outline-danger' => 'border border-danger-main text-danger-main bg-transparent hover:bg-danger-focus
disabled:border-neutral-30 disabled:text-neutral-70',
'outline-warning' => 'border border-warning-main text-warning-main bg-transparent hover:bg-warning-focus
disabled:border-neutral-30 disabled:text-neutral-70',
];

$disabledClass = $isLoading ? 'relative text-transparent disabled:cursor-wait' : 'disabled:cursor-not-allowed';
$buttonClasses = $variantClasses[$variant] . ' ' . $sizeClasses[$size] . ' ' . $disabledClass . ' h-fit inline-flex
items-center justify-center rounded-md focus:outline-none transition-colors duration-75';
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $buttonClasses]) }} {{ $disabled ? 'disabled' : '' }}>
    @if($isLoading)
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <x-heroicon-c-arrow-path class="animate-spin w-5 md:w-6" />
    </div>
    @endif

    {{-- Left Icon --}}
    @if($leftIcon)
    <x-dynamic-component :component="$leftIcon"
        class="mr-2 {{ $leftIconClass }} {{ $isLoading ? 'text-transparent' : '' }} w-5 md:w-6" />
    @endif

    {{-- Button Text --}}
    <span class="{{ $isLoading ? 'text-transparent' : '' }}">
        {{ $slot }}
    </span>

    {{-- Right Icon --}}
    @if($rightIcon)
    <x-dynamic-component :component="$rightIcon"
        class="ml-2 {{ $rightIconClass }} {{ $isLoading ? 'text-transparent' : '' }} w-5 md:w-6" />
    @endif
</button>
