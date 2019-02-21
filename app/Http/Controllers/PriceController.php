<?php

namespace App\Http\Controllers;

use App\Price;
use App\VehicleType;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vehicles = VehicleType::all();

        return view('prices.index',compact('vehicles'));
    }

    public function getPrices(){
        $prices = Price::with('vehicle')->get();
        return Datatables::of($prices)->addColumn('action', function ($price) {
            $re = '/prices/' . $price->id;
            $sh = '/prices/show/' . $price->id;
            $del = '/prices/delete/' . $price->id;
            return '<a href=' . $re . ' title="Edit Price"><i class="material-icons">create</i></a><a href=' . $del . ' title="Delete Price" style="color:red"><i class="material-icons">delete_forever</i></a>';
        })
            ->make(true);
    }

    public function getPricesAPI(){
        $prices = Price::with('vehicle')->get();
        return response()->json(['prices'=>$prices],200);
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
            $price = Price::create($input);
            DB::commit();
            return response()->json(['message'=>'Price Saved Successfully','price'=>$price],200);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['message'=>'Price Could not be save, please contact your system admin '.$e->getMessage()],200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }
}
