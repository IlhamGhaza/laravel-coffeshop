<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    // get
    public function index(){

        $customers = Customer::all();
        return response(['message' => 'success', 'data' => $customers], 200);
    }

    // store customer
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);

        $customers = Customer::create($request->all());
        return response()->json(['status' => 'success store data', 'data' => $customers], 200);

    }

    // update customer
    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);

        $customers = Customer::findOrfail($id);

        if(!$customers){
            return response()->json(['status' => 'error', 'message' => 'Customer not found'], 404);
        }
        $customers->update($request->all());

        return response()->json(['status' => 'data updated', 'data' => $customers], 200);
    }


    // delete customer
    public function destroy($id){

        $customers = Customer::findOrfail($id);

        if(!$customers){
            return response()->json(['status' => 'error', 'message' => 'Customer not found'], 404);
        }

        $customers->delete();
        return response()->json(['status' => 'customer deleted', 'data' => $customers], 200);
    }

}
