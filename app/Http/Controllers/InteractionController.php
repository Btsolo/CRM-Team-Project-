<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Http\Requests\StoreInteractionRequest;
use App\Http\Requests\UpdateInteractionRequest;
use App\Models\Customer;
use App\Models\User;

class InteractionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Interaction::with('user','customer')->get();

        if(request()->filled('search')){
            $search = request('search');
            $query->where('first_name','like',"%{$search}%")
                  ->orwhere('last_name','like',"%{$search}%")
                  ->orwhere('subject','like',"%{$search}%");
        }

        $interactions = $query->paginate(15);

        return view('interactions.index', compact('interactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('first_name', 'asc')->get();
        $customers = Customer::orderBy('first_name', 'asc')->get();
        return view('interactions.create', compact('users','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInteractionRequest $request)
    {
        Interaction::create($request->validated());

        return redirect()->route('interactions.index')->with('success','Interaction created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Interaction $interaction)
    {
        return view('interactions.show',compact('interaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interaction $interaction)
    {
        return view('interactions.edit',compact('interaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInteractionRequest $request, Interaction $interaction)
    {
        $interaction->update($request->validated());

        return redirect()->route('interactions.index')->with('success','Interaction edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interaction $interaction)
    {
        $interaction->delete();

        return redirect()->route('interactions.index')->with('success','Interaction deleted successfully');
    }
}
