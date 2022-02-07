<?php

namespace App\Http\Controllers;

use App\Models\QuoteModel;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class QuoteController extends Controller
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

    public function fnSendSMS(Request $request) {
        $allsms = QuoteModel::all();
        $smsnum = random_int(0,count($allsms)-1);
        $message = $allsms[$smsnum]->msg_quote;
        
        try {   
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
            $client = new Client($account_sid, $auth_token);

            foreach($request->numberarray as $receiverNumber)
            {
                // var_dump($receiverNumber);
                $client->messages->create($receiverNumber, [
                    'from' => $twilio_number, 
                    'body' => $message]);
            }  
            var_dump('SMS Sent Successfully.');die();
  
        } catch (Exception $e) {
            var_dump("Error: ". $e->getMessage());die();
        }
        // var_dump($smscontent);die();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuoteModel  $quoteModel
     * @return \Illuminate\Http\Response
     */
    public function show(QuoteModel $quoteModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuoteModel  $quoteModel
     * @return \Illuminate\Http\Response
     */
    public function edit(QuoteModel $quoteModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuoteModel  $quoteModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuoteModel $quoteModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuoteModel  $quoteModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuoteModel $quoteModel)
    {
        //
    }
}
