<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $pendingTasks = Task::where('status', 'planning')->count();
        $recentInteractions = Interaction::latest()->limit(3)->get();
        $projects = Project::latest()->get();
        $projectCount = Project::count();

        $user = Auth::user();
        $growthRate = Project::whereBetween('created_at', [now()->subMonths(6), now()])->count() /
              max(1, Project::whereBetween('created_at', [now()->subMonths(12), now()->subMonths(6)])->count()) * 100 - 100;

$taskCompletionRate = Task::whereNotNull('completed_at')
    ->whereBetween('completed_at', [now()->subMonths(6), now()])
    ->count() / max(1, Task::whereBetween('completed_at', [now()->subMonths(12), now()->subMonths(6)])->count()) * 100 - 100;

$interactionStability = Interaction::whereBetween('created_at', [now()->subMonths(6), now()])->count() -
                        Interaction::whereBetween('created_at', [now()->subMonths(12), now()->subMonths(6)])->count();
        return view('dashboard', compact('totalCustomers','projectCount', 'pendingTasks', 'recentInteractions','projects','user','growthRate', 'taskCompletionRate', 'interactionStability'));
    }
}
