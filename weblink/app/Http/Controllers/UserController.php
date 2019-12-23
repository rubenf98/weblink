<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\QueryFilters\UserFilters;
use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $filters = UserFilters::hydrate($request->query());
        return view('users.index')->with('users', UsersResource::collection(User::filterBy($filters)->get()));
    }

    //
    public function show($id)
    {
        $user = Auth::user();
        if (User::find($id)) {
            //return new UserResource(User::find($id));
            return view('users.show')->with('user', new UserResource(User::find($id)));
        } else {
            return 'Error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, User $user)
    {
        if ($user->role != 'admin') {
            if ($user->status == "active")
                $user->status = "banned";
            else
                $user->status = "active";

            $user->save();
        } else {
            $request->session()->flash('status', ['title' => "Careful", 'message' => 'An admin can\'t be banned!', 'class' => 'warning']);
        }



        return redirect('/dashboard/users');
    }

    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'b_day' => 'required',
            'role' => 'required',
        ]);

        $user = new Request([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'country' => $request->country,
            'b_day' => $request->b_day,
        ]);

        $insert_user = User::create($user->toArray());

        $insert_user->role = $request->role;
        $insert_user->save();

        $request->session()->flash('status', ['title' => "YESSS!", 'message' => 'User created with success!', 'class' => 'success']);
        return redirect('/dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(null, 204);
    }
}
