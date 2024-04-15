<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Response\Response;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $row = $request->input("row", 2);
        $status = $request->input("status", 1);
        
        $users = User::when(

            $status == 1, 

            function($query){
                $query->whereNull("deleted_at");
            }, function($query){
                $query->whereNotNull("deleted_at");
            }

        )->withTrashed()->paginate($row);

        UserResource::collection($users);

        return $users;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        $users = User::create([
            'username' => $username,
            'password' => $password
        ]);

        // return new UserResource($users);
        return Response::response(Response::CREATED_USER, Response::STATUS_CREATED, new UserResource($users));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user = $user->update([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::where("id", $id)->first();
        $user->delete();

        return Response::response(Response::DELETE_SUCCESS, Response::STATUS_OK);
    }

    public function restore($id){
        $user = User::where('id', $id)->withTrashed()->first();
        $user->restore();

        return Response::response(Response::RESTORE_SUCCESS, Response::STATUS_OK);
    }
}
