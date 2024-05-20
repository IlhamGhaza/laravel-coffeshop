<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(5);
        return view('pages.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cutomer = new \App\Models\Customer;
        $cutomer->name = $request->name;
        $cutomer->email = $request->email;
        $cutomer->phone_number = $request->phone_number;

        $cutomer->save();

        return redirect()->route('customer.index')->with('success', 'Customer successfully created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer= Customer::findOrfail($id);
        return view('pages.custome.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);

        $customer = Customer::findOrfail($id);
        $customer->update($request->all());
        return redirect()->route('customer.index')->with('success', 'Customer successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Customer::findOrFail($id);
        $user->delete();
        return redirect()->route('customer.index');

    }
}
