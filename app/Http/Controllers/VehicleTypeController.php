<?php

namespace App\Http\Controllers;

use App\VehicleType;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vehicle-types.index');
    }

    public function getVehicles(){
        $vehicles = VehicleType::all();

        return Datatables::of($vehicles)->addColumn('action', function ($vehicle) {
            $re = '/vehicles/' . $vehicle->id;
            $sh = '/vehicles/show/' . $vehicle->id;
            $del = '/vehicles/delete/' . $vehicle->id;
            return '<a href=' . $re . ' title="Edit Vehicle"><i class="material-icons">create</i></a><a href=' . $del . ' title="Delete Vehicle" style="color:red"><i class="material-icons">delete_forever</i></a>';
        })
            ->make(true);
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
        DB::beginTransaction();
        try{
            $input = $request->all();
            $vehicle = VehicleType::create($input);
            DB::commit();
            return response()->json(['message'=>'Vehicle Type Saved Successfully','vehicle'=>$vehicle],200);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['message'=>'Vehicle Could not be save, please contact your system admin '.$e->getMessage()],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleType $vehicleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleType $vehicleType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleType $vehicleType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleType $vehicleType)
    {
        //
    }
}
