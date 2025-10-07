<?php

namespace App\Helpers;

class ColorHelper
{
    public static function avatarColor(string $bg): string
    {
        $colors = [
            '!bg-red-500', '!bg-blue-500', '!bg-green-500',
            '!bg-yellow-500', '!bg-purple-500', '!bg-pink-500', '!bg-indigo-500',
        ];

        $index = crc32($bg) % count($colors);
        return $colors[$index];
    }
}
