<?php

namespace App\Http\Controllers\Access;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;

use function PHPSTORM_META\map;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listData()
    {
        $roles = Role::all();
        return view('role.list-role',compact('roles'));
    }
    public function index()
    {
        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Permission::select('module')->distinct()->orderBy('module')->get()->toArray();
        return view('role.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated() + ['guard_name' => 'web'])->syncPermissions($request->permission);
        return redirect()->route('site.roles.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $modules = Permission::select('module')->distinct()->orderBy('module')->get()->toArray();
        return view('role.edit', compact('modules', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if ($role->users->count()) {
            $role->syncPermissions($request->permission);
            return redirect()->route('site.roles.index')->with('success', 'Hanya Permission Yang Dapat Diperbaharui');
        } else {
            $role->update($request->validated() + ['guard_name' => 'web']);
            $role->syncPermissions($request->permission);
            return redirect()->route('site.roles.index')->with('success', __('Data Updated Successfully!'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->users->count()) {
            return response()->json([
                'status' => 'failed',
                'msg' => __('Whoops! Something went wrong.')
            ]);
        } else {
            $role->delete();
            return response()->json([
                'status' => 'success',
                'msg' => __('Data Deleted Successfully!')
            ]);
        }
        
    }
}