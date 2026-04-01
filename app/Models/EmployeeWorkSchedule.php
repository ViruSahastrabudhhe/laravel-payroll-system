<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use App\Models\Employee;

class EmployeeWorkSchedule extends Model
{
    /** @use HasFactory<\Database\Factories\WorkScheduleFactory> */
    use HasFactory;

    protected $table = 'employee_work_schedules';

    protected $fillable = [
        'employee_id',
        'work_schedule_id',
        'user_id',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function workSchedule() {
        return $this->belongsTo(WorkSchedule::class, 'work_schedule_id', 'id');
    }

    #[Scope]
    protected function findAllWithUserID(Builder $query): void {
        $query->where('user_id', '=', auth()->user()->id);
    }
}
