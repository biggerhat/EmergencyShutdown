<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('admin.index');
    }

    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUsers() {
        $users = User::orderby('username')->paginate(5);
        return view('admin.listusers', compact('users'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUser($id) {
        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id');
        return view('admin.editusers', compact('user', 'roles'));
    }

    /**
     * @param $id
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateUser($id, UserRequest $request) {
        $user = User::findOrFail($id);

        $user->update($request->all());
        $user->roles()->sync($request->input('role_list', []));

        flash()->success($request->input('username') . ' has been updated successfully.');
        return redirect('admin/users');
    }
}
