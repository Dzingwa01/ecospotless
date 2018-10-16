<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Role::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permission = Permission::get();
        return response()->json(["permission"=>$permission]);
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
            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);

            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));

            DB::commit();
            return response()->json(['status'=>200,"role"=>$role]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>500,"message"=>$e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return response()->json(["role"=>$role,"role_permissions"=>$rolePermissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return response()->json(["role"=>$role,"role_permissions"=>$rolePermissions,"permission"=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::beginTransaction();
        try{
            $this->validate($request, [
                'name' => 'required',
                'permission' => 'required',
            ]);

            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));
            DB::commit();
            return response()->json(['status'=>200,"role"=>$role]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>500,"message"=>$e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::beginTransaction();
        try{
            DB::table("roles")->where('id',$id)->delete();
            DB::commit();
            return response()->json(['status'=>200,"message"=>"Role deleted successfully"]);

        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>500,"message"=>$e->getMessage()]);
        }

    }
}
