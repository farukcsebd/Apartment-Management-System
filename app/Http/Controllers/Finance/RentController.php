<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finance\Rent;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rents = Rent::orderBy('id', 'DESC')->get();
        return view('finance.rents.index', compact('rents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('finance.rents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rent = new Rent;

        $rent->floor_no = $request->floor_no;
        $rent->unit_no = $request->unit_no;
        $rent->rent_month = $request->rent_month;
        $rent->rent_year = $request->rent_year;
        $rent->renter_name = $request->renter_name;
        $rent->rent = $request->rent;

        $rent->water_bill = $request->water_bill;
        $rent->electric_bill = $request->electric_bill;
        $rent->gas_bill = $request->gas_bill;
        $rent->security_bill = $request->security_bill;
        $rent->utility_bill = $request->utility_bill;

        
        $date = str_replace('/', '-', $request->issue_date);
        $rent->issue_date = date("Y-m-d", strtotime($date));
        $date = str_replace('/', '-', $request->bill_paid_date);
        $rent->bill_paid_date = date("Y-m-d", strtotime($date));
        
        $rent->other_bill = $request->other_bill;
        $rent->total_rent = $request->total_rent;
        $rent->bill_status = $request->bill_status;

        $rent->save();
        $request->session()->flash('alert-success', 'Rent Successfully added');
        return redirect('rent');
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
        $rent = Rent::find($id);
        return view('finance.rents.edit', compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rent = new Rent;

        $id = $request->id;

        $rent = Rent::find($id);
        $rent->floor_no = $request->floor_no;
        $rent->unit_no = $request->unit_no;
        $rent->rent_month = $request->rent_month;
        $rent->rent_year = $request->rent_year;
        $rent->renter_name = $request->renter_name;
        $rent->rent = $request->rent;

        $rent->water_bill = $request->water_bill;
        $rent->electric_bill = $request->electric_bill;
        $rent->gas_bill = $request->gas_bill;
        $rent->security_bill = $request->security_bill;
        $rent->utility_bill = $request->utility_bill;

        
        $date = str_replace('/', '-', $request->issue_date);
        $rent->issue_date = date("Y-m-d", strtotime($date));
        $date = str_replace('/', '-', $request->bill_paid_date);
        $rent->bill_paid_date = date("Y-m-d", strtotime($date));
        
        $rent->other_bill = $request->other_bill;
        $rent->total_rent = $request->total_rent;
        $rent->bill_status = $request->bill_status;

        $rent->save();
        $request->session()->flash('alert-success', 'Rent Successfully updated');
        return redirect('rent');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $rent = Rent::find($id);
        $rent->delete();
        $request->session()->flash('alert-success', 'Rent Successfully deleted');
        return redirect('rent');
    }
}