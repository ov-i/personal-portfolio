<?php

namespace App\Http\Controllers\API\Admin;

use App\Actions\Users\CreateUser;
use App\Actions\Users\DeleteUser;
use App\Actions\Users\ShowUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(User $user): JsonResponse
    {
        $users = $user->query()->get();

        if (count($users) === 0)
            return response()->json(['error' => true, 'users' => []], 404);

        return response()->json(['error' => false, 'users' => $users], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUser $createUser
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request, CreateUser $createUser): JsonResponse
    {
        $user = $createUser($request->all());

        return response()->json(['error' => false, 'user' => $user], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param ShowUser $showUser
     * @return JsonResponse
     */
    public function show(User $user, ShowUser $showUser): JsonResponse
    {
        $user = $showUser($user->id);
        $roles = $user->roles()->get();

        return response()->json(['error' => false, 'user' => $user, 'roles' => $roles], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @param DeleteUser $deleteUser
     * @return JsonResponse
     */
    public function destroy(User $user, DeleteUser $deleteUser): JsonResponse
    {
        $deleteUser($user);

        return response()->json(['error' => false, 'message' => "Użytkownik $user->email usunięty"], 200);
    }
}
