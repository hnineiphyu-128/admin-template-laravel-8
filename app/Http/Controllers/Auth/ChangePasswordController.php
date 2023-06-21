<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Permission;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles'])->where('id', '<>', auth()->user()->id)->whereRelation('roles', 'id', auth()->user()->roles[0]->id)->get();
        $permissionIds = DB::table('permission_role')->where('role_id', auth()->user()->roles[0]->id)->pluck('permission_id')->toArray();
        $permissions = Permission::whereIn('id', $permissionIds)->get();

        return view('auth.passwords.edit', compact('users', 'permissions'));
    }

    public function update(UpdatePasswordRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->route('profile.password.edit')->with('message', __('global.change_password_success'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        return redirect()->route('profile.password.edit')->with('message', __('global.update_profile_success'));
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('global.delete_account_success'));
    }
}
