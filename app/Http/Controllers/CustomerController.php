<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CsvExportService;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerController extends Controller
{
    use AuthorizesRequests;
    protected $csvExportService;

    public function __construct(CsvExportService $csvExportService)
    {
        $this->csvExportService = $csvExportService;
    }
    public function exportCsv()
{
    $customers = Customer::latest()->get();

    $data = $customers->map(function ($customer) {
        return [
            $customer->first_name,
            $customer->last_name,
            $customer->email,
            $customer->phone_number,
            $customer->company_name,
            $customer->customer_type,
            $customer->industry,
            $customer->tags,
            $customer->status,
        ];
    })->toArray();

    $headers = [
        'First Name', 'Last Name', 'Email', 'Phone Number', 'Company Name', 
        'Customer Type', 'Industry', 'Tags', 'Status'
    ];

    $filename = 'customers_export_' . now()->format('Y_m_d_H_i_s') . '.csv';

    return $this->csvExportService->generateCsv($data, $filename, $headers);
}
    public function index()
    {
        $this->authorize('viewAny', Customer::class);
        
        $columns  = ['first_name', 'last_name', 'email', 'phone_number', 'customer_type', 'status'];
        $query = Customer::latest();
    
        // Search Filter
        if (request()->filled('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
    
        // Customer Type Filter
        if (request()->filled('customer_type')) {
            $query->where('customer_type', request('customer_type'));
        }
    
        // Status Filter
        if (request()->filled('status')) {
            $query->where('status', request('status'));
        }
    
        if (request()->has('trashed')) {
            $query->onlyTrashed();
        }
    
        $customers = $query->paginate(15);
    
        // Get distinct values for filters
        $customerTypes = Customer::select('customer_type')->distinct()->pluck('customer_type');
        $statuses = Customer::select('status')->distinct()->pluck('status');
    
        return view('customers.index', compact('customers', 'columns', 'customerTypes', 'statuses'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Customer::class);
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $this->authorize('create',Customer::class);
        Customer::create($request->validated());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $this->authorize('view',$customer);
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $this->authorize('update',$customer);
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $this->authorize('update',$customer);
        $customer->update($request->validated());

        return redirect()->route('customers.index')->with('success','Customer Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $this->authorize('delete',$customer);
        $customer->delete();

        return redirect()->route('customers.index')->with('success','Customer deleted successfully');
    }
    public function restore($id)
{
    $customer = Customer::onlyTrashed()->findOrFail($id);
    $this->authorize('restore', $customer);
    $customer->restore();

    return redirect()->route('customers.index')->with('success', 'Customer restored successfully');
}
public function forceDelete($id)
{
    $customer = Customer::onlyTrashed()->findOrFail($id);
    $this->authorize('forceDelete', $customer);
    $customer->forceDelete();

    return redirect()->route('customers.index')->with('success', 'Customer permanently deleted');
}

}
