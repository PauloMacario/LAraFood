<?php

namespace App\Http\Controllers\Admin\Acl;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $profile, $plan;

    public function __construct(Profile $profile, Plan $plan)
    {
        $this->profile = $profile;
        $this->plan = $plan;
        ;
    }

    public function plans($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', [
            'profile' => $profile,
            'plans' => $plans 
        ]);
    }

    public function profileAvailable(Request $request, $idProfile)
    {
        
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $plans = $profile->planAvailable($request->filter);

        return view('admin.pages.profiles.plans.available', [
            'profile' => $profile,
            'plans' => $plans,
            'filters' => $filters 
        ]);
    }

    public function attachProfilePlans(Request $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }
     
        if (!$request->plans || count($request->plans) == 0) {
            return redirect()
                ->back()
                ->with('alert', 'Precisa selecinar planos.');
        }

        $profile->plans()->attach($request->plans);

       
        return redirect()->route('profiles.plans', $profile->id)->with('success', 'Vinculado com sucesso.');;
    }

    public function detachProfilePlans(Request $request, $idProfile, $idPlan)
    {
        $profile = $this->profile->find($idProfile);
        $plan = $this->plan->find($idPlan);

        if (!$profile || !$plan) {
            return redirect()->back();
        }

        $profile->plans()->detach($plan);

        if ($request->segment(2) == "plans") {
            
            return redirect()->route('profiles.plans', $plan->id)->with('info', 'Desvinculado com sucesso.');

        }

        if ($request->segment(2) == "profiles") {

            return redirect()->route('profiles.plans', $profile->id)->with('info', 'Desvinculado com sucesso.');
        }


    }
}
