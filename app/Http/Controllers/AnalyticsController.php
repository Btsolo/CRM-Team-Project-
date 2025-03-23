<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        
        $totalCustomers = Customer::count();
        $totalProjects = Project::count();
        $totalTasks = Task::count();

      
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
        
        $customersLastMonth = Customer::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $projectsLastMonth = Project::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $tasksLastMonth = Task::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();

       
        $lastYearStart = Carbon::now()->subYear()->startOfYear();
        $lastYearEnd = Carbon::now()->subYear()->endOfYear();

        $customersLastYear = Customer::whereBetween('created_at', [$lastYearStart, $lastYearEnd])->count();
        $projectsLastYear = Project::whereBetween('created_at', [$lastYearStart, $lastYearEnd])->count();
        $tasksLastYear = Task::whereBetween('created_at', [$lastYearStart, $lastYearEnd])->count();

       
        $monthlyData = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthlyData[] = [
                'month' => $month->format('M Y'),
                'customers' => Customer::whereMonth('created_at', $month->month)->whereYear('created_at', $month->year)->count(),
                'projects' => Project::whereMonth('created_at', $month->month)->whereYear('created_at', $month->year)->count(),
                'tasks' => Task::whereMonth('created_at', $month->month)->whereYear('created_at', $month->year)->count(),
            ];
        }

        return view('analytics.index', compact(
            'totalCustomers', 'totalProjects', 'totalTasks',
            'customersLastMonth', 'projectsLastMonth', 'tasksLastMonth',
            'customersLastYear', 'projectsLastYear', 'tasksLastYear',
            'monthlyData'
        ));
    }
}
