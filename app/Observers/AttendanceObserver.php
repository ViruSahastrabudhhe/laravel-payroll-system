<?php

namespace App\Observers;

use App\Models\Attendance;
use App\Models\EmployeeLeaveBalance;

class AttendanceObserver
{
    public function created(Attendance $attendance): void
    {
        $this->processLeaveDeduction($attendance);
    }

    public function updated(Attendance $attendance): void
    {
        $this->processLeaveDeduction($attendance);
    }

    private function processLeaveDeduction(Attendance $attendance): void
    {
        $leaveBalance = EmployeeLeaveBalance::where('employee_id', $attendance->employee_id)
            ->where('user_id', $attendance->user_id)
            ->first();

        if (!$leaveBalance) {
            return;
        }

        if ($attendance->isAbsent()) {
            $leaveBalance->decrement('leave_balance', 1);
        } elseif ($attendance->isLate()) {
            $leaveBalance->decrement('leave_balance', 0.5);
        }
    }
}
