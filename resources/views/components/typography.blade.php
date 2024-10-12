{{-- resources/views/components/typography.blade.php --}}
@props([
'as',
'class',
'weight',
'font', // poppins atau futura
'variant',
])

@php
// Mapping font weights
$weightClasses = [
'regular' => 'font-normal',
'medium' => 'font-medium',
'semibold' => 'font-semibold',
'bold' => 'font-bold',
'extrabold' => 'font-extrabold',
];

// Mapping font variants
$variantClasses = [
'h1' => 'md:text-[80px] md:leading-[96px]',
'h2' => 'md:text-[72px] md:leading-[90px]',
'h3' => 'md:text-[60px] md:leading-[80px]',
'h4' => 'md:text-[48px] md:leading-[64px]',
'h5' => 'md:text-[32px] md:leading-[36px]',
'h6' => 'md:text-[28px] md:leading-[32px]',
't' => 'md:text-[20px] md:leading-[24px]',
'p' => 'md:text-[18px] md:leading-[24px]',
'bt' => 'md:text-[16px] md:leading-[24px]',
'btn' => 'md:text-[16px] md:leading-[18px]',
'c' => 'md:text-[14px] md:leading-[24px]',
'p2' => 'md:text-[14px] md:leading-[18px]',
'btn-sm' => 'md:text-[14px] md:leading-[18px]',
'p3' => 'md:text-[12px] md:leading-[16px]',
];

// Combine the final classes
$classes = implode(' ', [
$font === 'poppins' ? 'font-poppins' : 'font-futura',
$weightClasses[$weight] ?? 'font-normal',
$variantClasses[$variant] ?? 'md:text-[18px] md:leading-[24px]',
$class
]);
@endphp

<{{ $as }} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</{{ $as }}>
