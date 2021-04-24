<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permissions', [
            'profile' => $profile,
            'permissions' => $permissions 
        ]);
    }

    public function profiles($idPermission)
    {
        $permission = $this->permission->find($idPermission);

        if (!$permission) {
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', [
            'profiles' => $profiles,
            'permission' => $permission
        ]);
    }


    public function permissionsAvailable(Request $request, $idProfile)
    {
        
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $profile->permissionAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', [
            'profile' => $profile,
            'permissions' => $permissions,
            'filters' => $filters 
        ]);
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }
     
        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                ->back()
                ->with('alert', 'Precisa selecinar permissões.');
        }

        $profile->permissions()->attach($request->permissions);

       
        return redirect()->route('profiles.permissions', $profile->id)->with('success', 'Vinculado com sucesso.');;
    }

    public function detachPermissionProfile(Request $request, $idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        if ($request->segment(2) == "permission") {
            
            return redirect()->route('permissions.profiles', $permission->id)->with('info', 'Desvinculado com sucesso.');

        }

        if ($request->segment(2) == "profiles") {

            return redirect()->route('profiles.permissions', $profile->id)->with('info', 'Desvinculado com sucesso.');
        }


    }
}
