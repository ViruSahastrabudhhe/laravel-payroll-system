<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Attendance;
use App\Models\WorkSchedule;
use App\Enums\AttendanceStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

class EmployeeAttendance extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeAttendanceFactory> */
    use HasFactory;

    protected $table = 'employee_attendances';

    protected $fillable = [
        'user_id',
        'employee_id',
        'attendance_id',
        'work_schedule_id',
        'date',
        'scheduled_start',
        'scheduled_end',
        'scheduled_minutes',
        'actual_time_in',
        'actual_time_out',
        'actual_minutes',
        'status',
        'late_minutes',
        'undertime_minutes',
        'overtime_minutes',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function attendance() {
        return $this->belongsTo(Attendance::class, 'attendance_id', 'id');
    }

    public function workSchedule() {
        return $this->belongsTo(WorkSchedule::class, 'work_schedule_id', 'id');
    }

    // public function getLateMinutes() {
    //     if (!$this->attendance->time_in) {
    //         return 0;
    //     }

    //     $timeIn = Carbon::parse($this->attendance->time_in)->format('H:i:s');
    //     $workStartTime = Carbon::parse($this->workSchedule->start_time)->format('H:i:s');

    //     if ($timeIn->diffInMinutes($workStartTime) > $this->workSchedule->grace_period_minutes) {
    //         return $timeIn->diffInMinutes($workStartTime) - $this->workSchedule->grace_period_minutes;
    //     }

    //     return 0;
    // }

    // public function isLate(): bool {
    //     if (!$this->attendance->time_in) {
    //         return false;
    //     }

    //     $timeIn = Carbon::parse($this->attendance->time_in)->format('H:i:s');
    //     $workStartTime = Carbon::parse($this->workSchedule->start_time)->format('H:i:s');

    //     if ($timeIn->diffInMinutes($workStartTime) > $this->workSchedule->grace_period_minutes) {
    //         $this->status = AttendanceStatus::Late->name;
    //         $this->late_minutes = $timeIn->diffInMinutes($workStartTime) - $this->workSchedule->grace_period_minutes;
    //         $this->save();

    //         return true;
    //     }

    //     $this->status = AttendanceStatus::Absent->name;
    //     $this->save();

    //     return Carbon::parse($this->attendance->time_in)->format('H:i:s') > $workStartTime;
    // }

    // public function isAbsent(): bool {
    //     return is_null($this->workSchedule->start_time) && is_null($this->workSchedule->end_time);
    // }

    #[Scope]
    protected function findAllWithUserID(Builder $query): void {
        $query->where('user_id', '=', auth()->user()->id);
    }
}
