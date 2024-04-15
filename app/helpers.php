<?php

declare(strict_types=1);

if (!function_exists('image_url')) {
    function image_url(string $path): string
    {
        return (string) app()->make(\Cloudinary\Cloudinary::class)->image($path)->secure();
    }
}
