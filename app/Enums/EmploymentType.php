<?php

namespace App\Enums;

enum EmploymentType: string
{
    case Regular = 'Regular';
    case PartTime = 'Part-Time';
    case JobOrder = 'Job Order';
}
