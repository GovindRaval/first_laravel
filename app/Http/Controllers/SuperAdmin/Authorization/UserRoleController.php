<?php

namespace App\Http\Controllers\SuperAdmin\Authorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin as User;
use App\SuperAdmin\Role;
use Illuminate\Support\Facades\Lang;
use DB;

class UserRoleController extends Controller
{

    private $langFile = 'admin';

    public function index(Request $request)
    {
        $user       = new User;
        $user       = $user->getUserDataForUserRoles();
        $pageLength = $request->pageLength;
        return view("super-admin.user-role.index", compact('user','pageLength'));
    }

    public function bulkAssign()
    {
        $userList = User::getUserData();
        $roleList = Role::getRoles();
        return view("super-admin.user-role.bulk_assign", compact('userList', 'roleList'));
    }

    public function saveUserRole(Request $request)
    {
        $langFile      = $this->langFile;
        $validatedData = $request->validate([
            'role_id' => 'required',
            'user_id' => 'required',
                ], [
            'role_id.required' => Lang::get($this->langFile . '.error-role-user-req-role-id'),
            'user_id.required' => Lang::get($this->langFile . '.error-role-user-req-user-id')
        ]);
        DB::beginTransaction();

        $users = $request->user_id;
        $roles = $request->role_id;
        try
        {
            $flag = true;
            foreach ($users as $user)
            {
                $user = User::find($user);
                if ($user)
                {
                    foreach ($roles as $role)
                    {
                        $role = Role::find($role);
                        if ($role)
                        {
                            $user->assignRole($role->name); //Assign Role to User
                        }
                        else
                        {
                            $flag = false;
                        }
                    }
                }
                else
                {
                    $flag = false;
                }
            }
            if ($flag)
            {
                DB::commit();
                $status       = 'success';
                $message_text = 'assign_role_user_success';
            }
            else
            {
                DB::rollback();
                $status       = 'error';
                $message_text = 'error';
            }
        }
        catch (Throwable $e)
        {
            DB::rollback();

            $status       = 'error';
            $message_text = 'error';
        }
        return redirect()->route('super-admin.user-role.index')->with($status, Lang::get($this->langFile . '.' . $message_text));
    }

    public function updateRole($id)
    {
        $user     = User::find($id);
        $langFile = $this->langFile;
        if ($user)
        {
            $userList = User::getUserDataForUserRoles();
            $roleList = Role::getRoles();
            return view("super-admin.user-role.update_role", compact('user', 'userList', 'roleList'));
        }
        else
        {
            return redirect()->route("super-admin.user-role.index")->with('error', Lang::get($langFile . '.record-not-found'));
        }
    }

    public function editUserRole(Request $request, $id)
    {
        $langFile      = $this->langFile;
        $validatedData = $request->validate([
            'role_id' => 'required',
                ], [
            'role_id.required' => Lang::get($this->langFile . '.error-role-user-req-role-id'),
        ]);
        $updateData    = User::find($id);
        $updateData    = $updateData->syncRoles($request->role_id);
        if ($updateData && $request->id == $id)
        {
            $updateData->fill($request->except('_token', 'user_id'));
            try
            {
                DB::beginTransaction();
                if ($updateData->save())
                {
                    $status       = 'success';
                    $message_text = '.role-updated-successfully';
                    DB::commit();
                }
                else
                {
                    $status       = 'error';
                    $message_text = '.error';
                    DB::rollback();
                }
            }
            catch (Throwable $e)
            {
                $status       = 'error';
                $message_text = '.error';
                DB::rollback();
            }
        }
        else
        {
            $message_text = 'record-not-found';
        }

        return redirect()->route('super-admin.user-role.index')->with('success', Lang::get($langFile . $message_text));
    }

}
