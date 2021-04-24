<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }

    public function index()
    {
        $profiles = $this->repository->paginate();
        
        return view('admin.pages.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    public function store(StoreUpdateProfile $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('profiles.index');
    }

    public function show($id)
    {
        $profile = $this->repository->find($id);

        if (!$profile) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.show', [
            'profile' => $profile
        ]);

    }

    public function edit($id)
    {
        $profile = $this->repository->find($id);

        if (!$profile) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.edit', [
            'profile' => $profile
        ]);
    }

    public function update(StoreUpdateProfile $request, $id)
    {
        $data = $request->all();

        $profile = $this->repository->find($id);

        if ($profile->update($data)) {
            return redirect()->route('profiles.index');
        }

        return redirect()->back()->with('error', 'Não foi possível atualizar.');
    }

    public function destroy($id)
    {
        $profile = $this->repository->find($id);
       
        if (!$profile) {
            return redirect()->back()->with('error', 'Não foi possível deletar.');
        }

        $profile->delete();

        return redirect()->route('profiles.index')->with('message', 'Registro deletado com sucesso.');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $profiles = $this->repository
            ->where(function($query) use ($request) {
                if ($request->filter) {
                    $query->where('name', $request->filter)
                    ->orWhere('description', 'LIKE', "%{$request->filter}%");
                }

            })
            ->paginate();
        
        return view('admin.pages.profiles.index', [
            'profiles' => $profiles,
            'filters' => $filters
        ]);
    }
}
