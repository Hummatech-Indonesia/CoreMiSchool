<?php

namespace App\Enums;

enum UploadDiskEnum: string
{
    case LOGO = "logo";
    case TEACHER = "teacher";
    case STAFF = "staff";
    case STUDENT = "student";
    case ATTENDANCE_JOURNAL = "attendance_journal";
}
