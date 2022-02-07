<?php

namespace App\Http\Controllers;

use App\Models\HomecellModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Twilio\Rest\Client;

class HomecellController extends Controller
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
        $receiverNumber = $request->phonenum;
        $location = strtolower($request->location);
        $district = strtolower($request->district);
        $street = strtolower($request->street);
        $address = HomecellModel::all(); 
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");
        $client = new Client($account_sid, $auth_token);

        foreach($address as $each)
        {
            if(Str::containsAll(strtolower($each->address) , [$location , $district , $street]))
            {
                $message = $each->name." homecell is close to you.\n(".$each->address.")";
                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = getenv("TWILIO_FROM");
                $client = new Client($account_sid, $auth_token);
                try{
                    $client->messages->create($receiverNumber , [
                        'from' => $twilio_number,
                        'body' => $message
                    ]);
                } catch (Exception $e) {
                    return response()->json("error");
                }
                return response()->json("success");
            }
        }
        return response()->json("noaddress");
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
     * @param  \App\Models\HomecellModel  $homecellModel
     * @return \Illuminate\Http\Response
     */
    public function show(HomecellModel $homecellModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomecellModel  $homecellModel
     * @return \Illuminate\Http\Response
     */
    public function edit(HomecellModel $homecellModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomecellModel  $homecellModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomecellModel $homecellModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomecellModel  $homecellModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomecellModel $homecellModel)
    {
        //
    }
}
