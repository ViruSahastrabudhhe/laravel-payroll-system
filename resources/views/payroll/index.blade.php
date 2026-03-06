@extends('layouts.app')

@section('content')
<div>
    
</div>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Hours Worked This Month</th>
                <th>Gross Pay</th>
                <th>Net Taxable Income</th>
                <th>GSIS Contribution</th>
                <th>PhilHealth Contribution</th>
                <th>Pag-Ibig Contribution</th>
                <th>Withholding Tax</th>
                <th>Cash Advance</th>
                <th>Adjustment</th>
                <th>Total Deductions</th>
                <th>Net Pay</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                <td>{{ $employee->hoursWorked($employee->id) }}</td>
                <td>P{{ round($employee->grossPay($employee->id), 2) }}</td>
                <td>P{{ round($employee->netTaxableIncome($employee->id), 2) }}</td>
                <td>
                    @if ($employee->isRegular())
                    P{{ round($employee->gsisContribution(), 2) }}
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if ($employee->isRegular())
                    P{{ round($employee->philHealthContribution(), 2) }}
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if ($employee->isRegular())
                    P{{ $employee->pagIbigContribution() }}
                    @else
                    -
                    @endif
                </td>
                <td>P{{ round($employee->withholdingTax($employee->id), 2) }}</td>
                <td>-</td>
                <td>-</td>
                <td>P{{ round($employee->totalDeductions($employee->id), 2) }}</td>
                <td>P{{ round($employee->netPay($employee->id), 2) }}</td>
            </tr>
            @empty
            <p>No employees on payroll</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection