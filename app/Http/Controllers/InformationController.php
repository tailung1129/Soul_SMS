<?php

namespace App\Http\Controllers;

use App\Models\InformationModel;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class InformationController extends Controller
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

    public function fnSendSMS(Request $request) {
        $allsms = InformationModel::all();
        $smsnum = random_int(0,count($allsms)-1);
        $message = $allsms[$smsnum]->msg_information;
        
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
            var_dump('SMS Sent Successfully.');
            // return View::make('information')->with('success1' , 'SMS Sent Successfully.');
  
        } catch (Exception $e) {
            var_dump("Error: ". $e->getMessage());
            // return View::make('information')->with('success1' , 'SMS Sent Successfully.');
        }
        // var_dump($smscontent);die();
    }
    
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
     * @param  \App\Models\InformationModel  $informationModel
     * @return \Illuminate\Http\Response
     */
    public function show(InformationModel $informationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InformationModel  $informationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(InformationModel $informationModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InformationModel  $informationModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InformationModel $informationModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InformationModel  $informationModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformationModel $informationModel)
    {
        //
    }
}
