<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Redirect;
use App\InstallmentReceipt;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InstallmentReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Request::all();


            $ir = new InstallmentReceipt;
            $ir->ir_no                  = $data['no'];
            $ir->ir_paymentmethod       = $data['paymentmethod'];
            $ir->ir_paymentdate         = $data['paymentdate'];
            $ir->ir_dateissued          = $data['dateissued'];

            $ir->save();
            return Redirect::to('/admin/managereceipt');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = InstallmentReceipt::all();
        return view('admin.managereceipt')->with('receipts', $data)->with('type','installment');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Request::all();

        print_r($data);
        $apartment =  InstallmentReceipt::find($id);

        $ir->ir_paymentmethod       = $data['paymentmethod'];
        $ir->ir_paymentdate         = $data['paymentdate'];
        $ir->ir_dateissued          = $data['dateissued'];

        $apartment->save();

        return Redirect::to('/admin/manageapartment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
