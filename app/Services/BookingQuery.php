<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingQuery
{
    protected $safeParms = [
        'day' => ['eq'],
        'phone' => ['eq'],
        'service' => ['eq'],
        'status' => ['eq'],
    ];

    protected $columnMap = [
        'day' => 'day',
        'service' => 'service',
        'status' => 'status',
    ];

    protected $operatorsMap = [
        'eq' => '=',
    ];

    public function transform(Request $request)
    {
        $eloQuery = [];
        foreach ($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorsMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
