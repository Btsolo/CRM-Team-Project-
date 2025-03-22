<?php
namespace App\Http\Controllers;

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
        $projects = Project::latest()->take(5)->get();
        $user = Auth::user();
        return view('dashboard', compact('totalCustomers', 'pendingTasks', 'recentInteractions','projects','user'));
    }
}
