<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->authorizeResource(Role::class, 'role');
    }
    public function index()
    {
        $roles = Role::withCount('permissions')->get();
        return response()->view('cms.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator(
            $request->all(),
            [
                'guard' => 'required|string|in:user,admin,profession',
                'name' => 'required|string|min:3|max:40',
            ]
        );

        if (!$validator->fails()) {
            $role = new Role();
            $role->name = $request->input('name');
            $role->guard_name = $request->input('guard');
            $isSaved = $role->save();
            return response()->json(['message' => $isSaved ?  __('cms.create_success') :  __('cms.create_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }
    public function editRolePermissions(Request $request, Role $role)
    {
        $permissions = Permission::where('guard_name', '=', $role->guard_name)->get();
        $rolePermissions = $role->permissions;
        if (count($rolePermissions) > 0) {
            foreach ($permissions as $permission) {
                $permission->setAttribute('granted', false);
                foreach ($rolePermissions as $rolePermission) {
                    if ($rolePermission->id == $permission->id) {
                        $permission->setAttribute('granted', true);
                        break;
                    }
                }
            }
        }
        return response()->view('cms.roles.role-permissions', [
            'role' => $role, 'permissions' => $permissions
        ]);
    }

    public function updateRolePermissions(Request $request, Role $role)
    {
        $validator = Validator($request->all(), [
            'role_id' => 'required|integer|exists:roles,id',
            'permission_id' => 'required|numeric|exists:permissions,id',
        ]);
        if (!$validator->fails()) {
            $role =  Role::findOrFail($request->get('role_id'));
            $permession = Permission::findOrFail($request->get('permission_id'));

            // if role has permission revoke يعني اسحبها منها 
            // if role not have permission اعطيها الصلاحية
            $role->hasPermissionTo($permession) ?  $role->revokePermissionTo($permession) :  $role->givePermissionTo($permession);
            return response()->json(['message' => __('cms.PermissionUpdatedSuccessfully')], Response::HTTP_OK);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return response()->view('cms.roles.edit', ['role' => $role]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:40',
            'guard' => 'required|string|in:admin,user,profession',
        ]);

        if (!$validator->fails()) {
            $role->name = $request->get('name');
            $role->guard_name =  $request->get('guard');
            $isSaved = $role->save();
            return response()->json(['message' => $isSaved ? __('cms.edit_success') : __('cms.edit_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $isDeleted = $role->delete();
        return response()->json([
            'message' => 'Deleted successfully'
        ], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
