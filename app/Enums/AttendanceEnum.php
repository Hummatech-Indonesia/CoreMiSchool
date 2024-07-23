<?php

namespace App\Enums;

enum AttendanceEnum: string
{
    case PRESENT = 'present';
    case LATE = 'late';
    case SICK = 'sick';
    case ALPHA = 'alpha';
    case PERMIT = 'permit';

    public function label(): string
    {
        return match ($this) {
            self::PRESENT => 'masuk',
            self::LATE => 'telat',
            self::SICK => 'sakit',
            self::ALPHA => 'alpha',
            self::PERMIT => 'izin',
        };
    }
}
