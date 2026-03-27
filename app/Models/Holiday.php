<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;

class Holiday extends Model
{
    /** @use HasFactory<\Database\Factories\HolidayFactory> */
    use HasFactory;

    protected $table = 'holidays';

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'holiday_duration',
        'user_id',
    ];

    #[Scope]
    protected function findAllWithUserID(Builder $query): void {
        $query->where('user_id', '=', auth()->user()->id);
    }

    public static function getHolidayDatesInMonth($year, $month, $userId): array
    {
        $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();

        $holidays = self::where('user_id', $userId)
            ->where(function($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('start_date', [$startOfMonth, $endOfMonth])
                      ->orWhereBetween('end_date', [$startOfMonth, $endOfMonth])
                      ->orWhere(function($q) use ($startOfMonth, $endOfMonth) {
                          $q->where('start_date', '<=', $startOfMonth)
                            ->where('end_date', '>=', $endOfMonth);
                      });
            })
            ->get();

        $holidayDates = [];
        foreach ($holidays as $holiday) {
            $start = Carbon::parse($holiday->start_date)->max($startOfMonth);
            $end = Carbon::parse($holiday->end_date)->min($endOfMonth);
            
            while ($start->lte($end)) {
                $holidayDates[] = $start->format('Y-m-d');
                $start->addDay();
            }
        }

        return array_unique($holidayDates);
    }
}
