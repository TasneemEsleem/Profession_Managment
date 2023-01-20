<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\ProfessionSkill;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileProfessionController extends Controller
{
   
    public function profile()
    {
        // $profi=Profession::all(); 
        $profile= Profile::where('profession_id', '=', auth()->user()->id)->with('profession')->first();
        // $profession=Profession
        $id=auth('profession')->user()->id;
        $profession_skills = ProfessionSkill::Where('profession_id', '=', auth()->user()->id)->with('skills')->get();
        // dd($profession_skills);
        return response()->view('cms.profession.Profile-Profession', [
            'profile' => $profile,'profession_skills' => $profession_skills
        ]);
    }
    public function portfolio(){
        $portfolios = Portfolio::where('profession_id', '=', auth()->user()->getAuthIdentifier())->get();
        return response()->view('cms.profession.portfolio', ['portfolios' => $portfolios]);
    }
}
