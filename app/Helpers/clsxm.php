<?php

if (!function_exists('clsxm')) {
    /**
     * Combine class names into a single string.
     *
     * @param  mixed ...$classes
     * @return string
     */
    function clsxm(...$classes): string
    {
        return implode(' ', array_filter($classes, function ($class) {
            return !empty($class);
        }));
    }
}
