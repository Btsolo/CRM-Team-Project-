<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Http\Requests\StoreInteractionRequest;
use App\Http\Requests\UpdateInteractionRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InteractionController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize('viewAny',Interaction::class);
        $columns = ['customer_id','type','subject','details','interaction_date'];
        $query = Interaction::with('user','customer')->latest();
        if (request()->filled('search')) {
            $search = request('search');
            $query->where('subject', 'like', "%{$search}%")
                  ->orWhere('details', 'like', "%{$search}%")
                  ->orWhereHas('customer', function ($q) use ($search) {
                      $q->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('user', function ($q) use ($search) {
                      $q->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%");
                  });
        }
        
        if (request()->has('trashed')) {
            $query->onlyTrashed();
        }

        $interactions = $query->paginate(15);

        return view('interactions.index', compact('interactions','columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Interaction::class);
        $users = User::orderBy('first_name', 'asc')->get();
        $customers = Customer::orderBy('first_name', 'asc')->get();
        return view('interactions.create', compact('users','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInteractionRequest $request)
    {
        $this->authorize('create',Interaction::class);
        Interaction::create($request->validated());

        return redirect()->route('interactions.index')->with('success','Interaction created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Interaction $interaction)
    {
        $this->authorize('view',$interaction);
        return view('interactions.show',compact('interaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interaction $interaction)
    { 
        $this->authorize('update',$interaction);
        $users = User::orderBy('first_name', 'asc')->get();
        $customers = Customer::orderBy('first_name', 'asc')->get();
        return view('interactions.edit',compact('interaction','users','customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInteractionRequest $request, Interaction $interaction)
    {
        $this->authorize('update',$interaction);
        $interaction->update($request->validated());

        return redirect()->route('interactions.index')->with('success','Interaction edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interaction $interaction)
    {
        $this->authorize('delete',$interaction);
        $interaction->delete();

        return redirect()->route('interactions.index')->with('success','Interaction deleted successfully');
    }
    public function restore(Interaction $interaction,$id)
{
    $this->authorize('restore',$interaction);
    $interaction = Interaction::onlyTrashed()->findOrFail($id);
    $interaction->restore();

    return redirect()->route('interactions.index')->with('success', 'Interaction restored successfully');
}
public function forceDelete(Interaction $interaction,$id)
{
    $this->authorize('forceDelete',$interaction);
    $interaction = Interaction::onlyTrashed()->findOrFail($id);
    $interaction->forceDelete();

    return redirect()->route('interactions.index')->with('success', 'Interaction permanently deleted');
}

}
