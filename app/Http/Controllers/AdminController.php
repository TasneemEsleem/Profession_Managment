<?php

namespace App\Http\Controllers;

use App\Mail\AdminWelcome;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Str;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Admin::class, 'admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with('roles')->get();
        return response()->view('cms.admins.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name', '=', 'admin')->get();
        return response()->view('cms.admins.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:2|max:90',
            'email' => 'required|email|unique:admins',
            'status' => 'nullable|boolean',
            'role_id' => 'required|numeric|exists:roles,id',
        ], [
            'name.required' => 'The Name Is not insert',
        ]);
        if (!$validator->fails()) {
            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $password = Str::random(8);
            $admin->password = Hash::make($password);
            $admin->status = $request->input('status');
            $isSaved = $admin->save();
            if ($isSaved) {
                $admin->syncRoles(Role::findById($request->input('role_id'), 'admin'));
                Mail::to([$admin])->send(new AdminWelcome($admin, $password));
            }

            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $roles = Role::where('guard_name', '=', 'admin')->get();
        $currentRole = $admin->roles[0];
        return response()->view('cms.admins.edit', [
            'admin' => $admin, 'roles' => $roles, 'currentRole' => $currentRole,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:2|max:90',
            'email' => 'required|email',
            'status' => 'nullable|boolean',
        ], [
            'name.required' => 'The Name Is not insert',
        ]);
        if (!$validator->fails()) {
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->status = $request->input('status');
            $isSaved = $admin->save();
            if ($isSaved) {
                $admin->syncRoles(Role::findById($request->input('role_id'), 'admin'));
            }
            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $deleted = $admin->delete();
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
