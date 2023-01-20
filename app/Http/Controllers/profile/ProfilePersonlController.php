<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProfessionSkill;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ProfilePersonlController extends Controller
{
    public function profileView()
    {
        // dd($profile::where('profession_id', '=', auth()->user()->getAuthIdentifier())->get());
        $profile=Profile::where('profession_id', '=', auth()->user()->id)->first();
        $categories = Category::where('status', '=', true)->get();
        $subcategories = SubCategory::where('status', '=', true)->get();
        $skills = Skill::where('status', '=', true)->get();
        return response()->view('cms.profession.Profile-Personal', [
            'profile' => $profile,'skills' => $skills,
            'categories' => $categories, 'subcategories' => $subcategories,
        ]);
    }
    public function profileUpdate(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'image' => 'image|mimes:png,jpg,jpeg',
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:10',
        ]);
        if (!$validator->fails()) {
            $user = auth()->user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->mobile = $request->input('mobile');

            if ($request->hasFile('image')) {
                // Storage::delete($user->image);
                $imagetitle =  time() . '_' . str_replace(' ', '', $user->name) . '.' . $request->file('image')->extension();
                if (auth('profession')->check()) {
                    $request->file('image')->storePubliclyAs('professions', $imagetitle, ['disk' => 'public']);
                    $user->image = 'professions/' . $imagetitle;
                }
            }
            $isSaved = $user->save();
            return response()->json(
                ['message' => $isSaved ? __('cms.Updated_success') : __('cms.Updated_failed')],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function infoProfile(Request $request)
    {
        // dd(Profile::findOrFail($request->get('profession_id')));
        // dd(Profile::where('profession_id', '=', auth()->user()->getAuthIdentifier()));

        $validator = Validator($request->all(), [
            'overview' => 'string',
            'experience_certificate' => 'mimes:pdf',
            'Prof_pract_certif' => 'mimes:pdf',
            'gender' => 'required|string',
            'birth_date' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'subcategory_id' => 'required|numeric|exists:sub_categories,id',
        ]);
        if (!$validator->fails()) {
            $profile = new Profile();
            $user = auth()->user();
            $profile->overview = $request->input('overview');
            $profile->gender = $request->input('gender');
            $profile->birth_date = $request->input('birth_date');
            $profile->category_id = $request->input('category_id');
            $profile->subcategory_id = $request->input('subcategory_id');
            $profile->profession_id = auth()->user()->getAuthIdentifier();

            if ($request->hasFile('experience_certificate')) {
                Storage::delete('professions/' . $profile->experience_certificate);
                $profileTitle =  time() . '_' . str_replace(' ', '', $user->name) . '.' . $request->file('experience_certificate')->extension();
                $request->file('experience_certificate')->storePubliclyAs('professions', $profileTitle, ['disk' => 'public']);
                $profile->experience_certificate = 'professions/' . $profileTitle;
            }
            if ($request->hasFile('Prof_pract_certif')) {
                Storage::delete('professions/' . $profile->Prof_pract_certif);
                $profileTitle =  time() . '_' . str_replace(' ', '', $user->name) . '.' . $request->file('Prof_pract_certif')->extension();
                $request->file('Prof_pract_certif')->storePubliclyAs('professions', $profileTitle, ['disk' => 'public']);
                $profile->Prof_pract_certif = 'professions/' . $profileTitle;
            }
            $prof_id = Profile::where('profession_id', '=', auth()->user()->getAuthIdentifier());
            if ($prof_id->exists()) {
                $prof_id->delete();
            }
            $isSaved = $profile->save();
            return response()->json(
                ['message' => $isSaved ? __('cms.Updated_success') : __('cms.Updated_failed')],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    public function StoreSkill(Request $request)
    {
        $validator = Validator($request->all(), [
            'skill_id' => 'required|exists:skills,id',
        ]);
        if (!$validator->fails()) {
            foreach ($request->input('skill_id') as $skill_id) {
                $prof_skill = new ProfessionSkill();
                $prof_skill->profession_id = auth()->user()->id;
                $prof_skill->skill_id = $skill_id;
                $isSaved = $prof_skill->save();
            }
            return response()->json(
                ['message' => 'Saved successfully' ],
                 Response::HTTP_CREATED 
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        } 
        }
   
}
