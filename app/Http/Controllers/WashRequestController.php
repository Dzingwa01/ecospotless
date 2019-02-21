<?php

namespace App\Http\Controllers;

use App\User;
use App\WashRequest;
use Illuminate\Http\Request;

class WashRequestController extends Controller
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

    public function getWashRequests(User $client){
        $client->load('client_requests');
        $requests = $client->requests;
        $requests->load('price','service','vehicle','valet','rating');

        return response()->json(['requests'=>$requests],200);
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
        $input = $request->all();
        DB::beginTransaction();
        try{
            $wash_request = WashRequest::create($input);
            DB::commit();
            $wash_request->fresh()->load('valet','service','client','rating');
            return response()->json(['message'=>'Wash request submitted successfully.','request'=>$wash_request],200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['message'=>'An error occurred, please try again. '.$e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WashRequest  $washRequest
     * @return \Illuminate\Http\Response
     */
    public function show(WashRequest $washRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WashRequest  $washRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(WashRequest $washRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WashRequest  $washRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WashRequest $washRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WashRequest  $washRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(WashRequest $washRequest)
    {
        //
    }
}
