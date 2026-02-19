<?php

namespace App\Models;

use App\Models\Scopes\EmployeeScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy(EmployeeScope::class)]
class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'date_of_birth',
        'address',
        'phone_number',
        'department',
        'salary_grade',
        'employment_type',
        'is_active',
        'position_id',
        'user_id',
    ];

}
