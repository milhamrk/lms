<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Role;
use App\Models\UserMeta;
use App\Models\UserOccupation;
use App\Models\UserZoomApi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function setting($step = 1)
    {
        $user = auth()->user();
        $categories = Category::where('parent_id', null)
            ->with('subCategories')
            ->get();
        $userMetas = $user->userMetas;

        $occupations = $user->occupations->pluck('category_id')->toArray();


        $userLanguages = getGeneralSettings('user_languages');
        if (!empty($userLanguages) and is_array($userLanguages)) {
            $userLanguages = getLanguages($userLanguages);
        } else {
            $userLanguages = [];
        }

        $data = [
            'pageTitle' => trans('panel.settings'),
            'user' => $user,
            'categories' => $categories,
            'educations' => $userMetas->where('name', 'education'),
            'experiences' => $userMetas->where('name', 'experience'),
            'occupations' => $occupations,
            'userLanguages' => $userLanguages,
            'currentStep' => $step,
        ];

        return view(getTemplate() . '.panel.setting.index', $data);
    }

    public function update(Request $request)
    {
		dd("hai");
        $data = $request->all();

        $organization = null;
        if (!empty($data['organization_id']) and !empty($data['user_id'])) {
            $organization = auth()->user();
            $user = User::where('id', $data['user_id'])
                ->where('organ_id', $organization->id)
                ->first();
        } else {
            $user = auth()->user();
        }

        $step = $data['step'] ?? 1;
        $nextStep = (!empty($data['next_step']) and $data['next_step'] == '1') ?? false;

        $rules = [
            'iban' => 'required_with:account_type',
            'account_id' => 'required_with:account_type',
            'identity_scan' => 'required_with:account_type',
            'bio' => 'nullable|string|min:3|max:48',
        ];

        if ($step == 1) {
            $rules = array_merge($rules, [
                'full_name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'mobile' => 'required|numeric|unique:users,mobile,' . $user->id,
            ]);
        }

        $this->validate($request, $rules);

        if (!empty($user)) {

            if (!empty($data['password'])) {
                $this->validate($request, [
                    'password' => 'required|confirmed|min:6',
                ]);

                $user->update([
                    'password' => User::generatePassword($data['password'])
                ]);
            }

            $updateData = [];

            if ($step == 1) {
                $joinNewsletter = (!empty($data['join_newsletter']) and $data['join_newsletter'] == 'on');

                $updateData = [
                    'email' => $data['email'],
                    'full_name' => $data['full_name'],
                    'mobile' => $data['mobile'],
                    'language' => $data['language'],
                    'newsletter' => $joinNewsletter,
                    'public_message' => (!empty($data['public_messages']) and $data['public_messages'] == 'on'),
                ];

                $this->handleNewsletter($data['email'], $user->id, $joinNewsletter);
            } 

            $toastData = [
                'title' => trans('public.request_success'),
                'msg' => trans('panel.user_setting_success'),
                'status' => 'success'
            ];
			
			$url = '';
            return redirect()->back()->with(['toast' => $toastData]);
        }
        abort(404);
    }
}
