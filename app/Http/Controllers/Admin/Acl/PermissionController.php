<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
 
    protected $repository;

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }

    public function index()
    {
        $permissions = $this->repository->paginate();
        
        return view('admin.pages.permissions.index', [
            'permissions' => $permissions
        ]); 
    }

    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    public function store(StoreUpdatePermission $request)
    {
        
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('permissions.index')->with('message', 'Cadastrado com sucesso.');
    }

    public function show($id)
    {
        $permission = $this->repository->find($id);

        if (!$permission) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.show', [
            'permission' => $permission
        ]);
    }

    public function edit($id)
    {
        $permission = $this->repository->find($id);

        if (!$permission) {
            return redirect()->back();
        }

        return view('admin.pages.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function update(StoreUpdatePermission $request, $id)
    {
        $data = $request->all();

        $permission = $this->repository->find($id);

        if ($permission->update($data)) {
            return redirect()->route('permissions.index')->with('message', 'Atualizado com sucesso.');
        }

        return redirect()->back()->with('error', 'Não foi possível atualizar.');
    }

    public function destroy($id)
    {
        $permission = $this->repository->find($id);
       
        if (!$permission) {
            return redirect()->back()->with('error', 'Não foi possível deletar.');
        }

        $permission->delete();

        return redirect()->route('permissions.index')->with('message', 'Registro deletado com sucesso.');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $permissions = $this->repository
            ->where(function($query) use ($request) {
                if ($request->filter) {
                    $query->where('name', $request->filter)
                    ->orWhere('description', 'LIKE', "%{$request->filter}%");
                }

            })
            ->paginate();
        
        return view('admin.pages.permissions.index', [
            'permissions' => $permissions,
            'filters' => $filters
        ]);
    }
}
