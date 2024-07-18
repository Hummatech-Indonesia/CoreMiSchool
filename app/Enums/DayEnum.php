<?php

namespace App\Enums;

enum DayEnum: string
{
    case MONDAY = "monday";
    case TUESDAY = "tuesday";
    case WEDNESDAY = "wednesday";
    case THURSDAY = "thursday";
    case FRIDAY = "friday";
    case SATURDAY = "saturday";
    case SUNDAY = "sunday";

    public function label(): string
    {
        return match ($this) {
            self::MONDAY => "senin",
            self::TUESDAY => "selasa",
            self::WEDNESDAY => "rabu",
            self::THURSDAY => "kamis",
            self::FRIDAY => "jumat",
            self::SATURDAY => "sabtu",
            self::SUNDAY => "minggu",
        };
    }
}
