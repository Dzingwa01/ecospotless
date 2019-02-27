<?php

namespace App\Http\Controllers;

use App\User;
use App\WashRequest;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

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

        $requests = $client->client_requests;
        $requests->load('price','service','valet','rating');
        $temp_requests = [];
        foreach ($requests as $request){
            if($request->status!='cancelled'){
                array_push($temp_requests,$request);
            }
        }
        $requests = $temp_requests;

        return response()->json(['requests'=>$requests],200);
    }

    public function acceptRequest(User $valet,WashRequest $request){
        DB::beginTransaction();
        try{
            $request->status =  'accepted';
           $request->valet_id = $valet->id;
           $request->save();
           DB::commit();
           return response()->json(['message'=>'Request accepted successfully'],200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message'=>'An Error occurred while accepting the request'],500);
        }
    }

    public function cancelRequest(User $client,WashRequest $request){
        DB::beginTransaction();
        try{
            $request->status =  'cancelled';
            $request->client_id = $client->id;
            $request->save();
            DB::commit();
            return response()->json(['message'=>'Request cancelled successfully'],200);

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message'=>'An Error occurred while accepting the request'],500);
        }
    }

    public function getAvailableRequests(){

        $requests = WashRequest::where('status','pending')->get();
        $requests->load('price','service','valet','rating');

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
