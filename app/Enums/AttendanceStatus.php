<?php

namespace App\Enums;

enum AttendanceStatus: string
{
    case Absent = 'Absent';
    case Late = 'Late';
    case OnTime = 'On-Time';
}
