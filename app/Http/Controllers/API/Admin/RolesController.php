<?php

namespace App\Http\Controllers\API\Admin;

use App\Actions\Roles\CreateRole;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\MessageBag;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $roles = Role::get();

        if (count($roles) === 0)
            return response()->json(['error' => true, 'roles' => []], 404);

        return response()->json(['error' => false, 'roles' => $roles], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request, CreateRole $createRole)
    {
        $role = $createRole($request->all());

        if ($role instanceof MessageBag)
            return response()->json(['error' => true, 'message' => $role->getMessages()], 400);

        return response()->json(['error' => false, 'role' => $role], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
