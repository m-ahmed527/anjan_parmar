<?php

namespace App\Interfaces\MediaService;

interface InteractsWithMedia
{
    function registerMediaCollection(): void;
    static function bootHasMedia();
}
