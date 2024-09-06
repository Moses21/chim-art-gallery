<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RegisteredUsersPerMonth extends ChartWidget
{

   protected static ?string $pollingInterval = '10s';


   protected static ?string $heading = 'Users Registered Per Month';

//    protected  ?string $columnSpan = 'Full';



   protected function getFilters(): ?array
   {
       return [
           'today' => 'Today',
           'week' => 'Last week',
           'month' => 'Last month',
           'year' => 'This year',
       ];
   }


    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $usersPerMonth = User::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month")
        )
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('count', 'month');

        return [
            'datasets' => [
                [
                    'label' => 'Users Registered',
                    'data' => $usersPerMonth->values(),
                ],
            ],
            'labels' => $usersPerMonth->keys(),
        ];
    }




    protected function getType(): string
    {
        return 'bar';
    }
}
