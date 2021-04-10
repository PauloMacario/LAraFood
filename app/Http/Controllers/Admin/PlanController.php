<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        
        if ($this->repository->create($data)){

            return redirect()->route('plans.index');
        }
    }

    public function show($id)
    {
        $plan = $this->repository->find($id);

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function edit($id)
    {
        $plan = $this->repository->find($id);

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        
        $plan = $this->repository->find($id);

        if ($plan->update($data)){

            return redirect()->route('plans.index');
        }
    }


    public function destroy($id)
    {
        $plan = $this->repository->find($id);

        if (!$plan) {
            return redirect()->back();
        }

        $plan->delete();

        return redirect()->route('plans.index');
        
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }
}
