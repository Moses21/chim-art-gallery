<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payments $payments)
    {
        //
    }



    /*
    Handle PayChangu Callback request here
    */

    public function callback(Request $request)
    {
        // Verify the transaction (you might need to use Paychangu's API to verify)
        $tx_ref = $request->query('tx_ref');
        $status = $request->query('status');

        // Assuming you have a method to verify the payment with Paychangu
        $verified = $this->verifyPayment($tx_ref);

        return dd($verified);

        if ($verified && $status === 'success') {
            // Handle successful payment, e.g., allow file download
            return redirect()->route('payment.success');
        } else {
            // Handle failed payment
            return redirect()->route('payment.failure');
        }
    }

    /*
    Handle paychangu webhook here
    */



    public function handleWebHook(Request $request)
    {

        Log::info('Changu_payment_status_received: ', $request->all());
        Log::channel('paychangu')->info('Webhook received: ', $request->all());

        return response()->json(['status' => 'success'], 200);
    }


    public function verifyPayment($tx_ref)
    {

        $response = Http::withOptions([
            'verify' => false,
        ])
        ->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . env("CHANGU_SECRET_KEY"),
        ])->get("https://api.paychangu.com/verify-payment/".$tx_ref);

        if($response->successful()){
            $data = $response->json();

            Log::channel('paychangu')->info('Payment verified: ', $data);
            // Check if the payment status is successful
            if (isset($data['status']) && $data['status'] === 'success' &&
                isset($data['data']['status']) && $data['data']['status'] === 'success') {
                return true;
            }
        }else{
            return false;
        }
    }

}
