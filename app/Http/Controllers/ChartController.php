<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residents;

class ChartController extends Controller
{
    public function residentPieChart()
    {
        $residents = Residents::all();

        if ($residents->isEmpty()) {
            // Handle the case when there is no data
            return view('admin.dashboard')->with('No data available for the chart.');
        }
        $religionCounts  = $residents->groupBy('religion')->map->count()->toArray();
        $genderCounts  = $residents->groupBy('gender')->map->count()->toArray();

        return view('admin.dashboard', compact('genderCounts', 'religionCounts'));
    }
}
