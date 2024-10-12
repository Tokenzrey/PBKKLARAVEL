{{-- resources/views/components/image.blade.php --}}
@props([
'useSkeleton' => false,
'src',
'width',
'height',
'alt' => '',
'class' => '',
'imgClass' => '',
'blurClass' => '',
])

@php
// Determine if a skeleton should be applied
$status = $useSkeleton ? 'loading' : 'complete';

// Check if width is set via the class
$widthIsSet = strpos($class, 'w-') !== false;
@endphp

<figure style="{{ !$widthIsSet ? 'width: ' . $width . 'px;' : '' }}" class="{{ $class }}">
    <img src="{{ $src }}" alt="{{ $alt }}" width="{{ $width }}" height="{{ $height }}"
        class="{{ $imgClass }} {{ $status === 'loading' ? 'animate-pulse ' . $blurClass : '' }}"
        onload="this.classList.remove('animate-pulse')" loading="lazy" />
</figure>
