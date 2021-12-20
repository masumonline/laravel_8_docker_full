<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('id', 'desc')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'details' => 'required',
            'url' => 'required',
            'sandurl' => 'required',
            'option' => 'required',
            'access_code' => 'required',
            'shop_id' => 'required',
            'short_name' => 'required',
            'secret_key' => 'required',
        ]);

        $payment = new Payment;
        $payment->title = $request->title;
        $payment->subtitle = $request->subtitle;
        $payment->details = $request->details;
        $payment->url = $request->url;
        $payment->sandurl = $request->sandurl;
        $payment->status = $request->status;
        $payment->option = $request->option;
        $payment->access_code = $request->access_code;
        $payment->shop_id = $request->shop_id;
        $payment->short_name = $request->short_name;
        $payment->secret_key = $request->secret_key;
        $payment->save();
        return redirect('payments')->with('success', 'Payments is Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {

        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'details' => 'required',
            'url' => 'required',
            'sandurl' => 'required',
            'option' => 'required',
            'access_code' => 'required',
            'shop_id' => 'required',
            'short_name' => 'required',
            'secret_key' => 'required',
        ]);

        $payment->title = $request->title;
        $payment->subtitle = $request->subtitle;
        $payment->details = $request->details;
        $payment->url = $request->url;
        $payment->sandurl = $request->sandurl;
        $payment->option = $request->option;
        $payment->status = $request->status;
        $payment->access_code = $request->access_code;
        $payment->shop_id = $request->shop_id;
        $payment->short_name = $request->short_name;
        $payment->secret_key = $request->secret_key;
        $payment->save();
        return redirect('payments')->with('success', 'Payments is Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect('payments')->with('warning', 'payment is Deleted!');
    }
}
