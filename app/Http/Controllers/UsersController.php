<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Entities\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        $roles = $role->all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'phone_number' => 'required|min:10',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required|array',
        ]);
        DB::transaction(function () use ($request) {
            $user = User::create($request->input());
            foreach ($request->get('roles') as $role) {
                $client = Role::findOrFail($role);
                $user->attachRole($client);
            }
        });

        return redirectWithInfo(route('users.index'), 'User has been created successfully');
    }

    /**
     * Block a specific user from accessing the dashboard
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function block(User $user)
    {
        $user->blocked = true;
        $user->save();
        return withInfo("The user {$user->name} has been blocked from accessing the dashboard", 'info', 'User Blocked');
    }

    /**
     * Block a specific user from accessing the dashboard
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function unblock(User $user)
    {
        $user->blocked = false;
        $user->save();
        return withInfo("The user {$user->name} has been granted access to the dashboard", 'success', 'Access Granted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $clone = clone $user;
        if (auth()->user()->id == $user->id) {
            return withInfo('You cannot delete your own account', 'danger', 'Operation Failed');
        }
        $user->delete();

        return withInfo("The user {$clone->name} was deleted successfully");
    }
}
