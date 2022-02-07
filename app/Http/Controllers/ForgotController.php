<?php

namespace App\Http\Controllers;

use App\Models\Forgot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\InvalidOrderException;
use Illuminate\Support\Facades\Hash;

class ForgotController extends Controller
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

    public function fnUpdate(Request $request)
    {
        $email = $request->email;
        $password = Hash::make($request->password);
        $user = DB::table('users')->where('email' , $email )->get();

        if(count($user)==0)
        {
        // var_dump("here is forgot controller");die();
            
            // $message = "These credentials do not match our records.";
            return response()->json("nouser");
        }
        DB::table('users')->where('email' , $email )->update(['password'=>$password]);
        return response()->json("success");
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
     * @param  \App\Models\Forgot  $forgot
     * @return \Illuminate\Http\Response
     */
    public function show(Forgot $forgot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forgot  $forgot
     * @return \Illuminate\Http\Response
     */
    public function edit(Forgot $forgot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forgot  $forgot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forgot $forgot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forgot  $forgot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forgot $forgot)
    {
        //
    }
}
