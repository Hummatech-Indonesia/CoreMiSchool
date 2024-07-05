<?php

namespace App\Enums;

enum RoleEnum: string
{
    case ADMIN = "admin";
    case STUDENT = "student";
    case TEACHER = "teacher";
    case SCHOOL = "school";
    case STAFF = "staff";
}
