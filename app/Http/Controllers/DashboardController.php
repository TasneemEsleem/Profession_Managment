<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Portfolio;
use App\Models\Profession;
use App\Models\ProfessionSkill;
use App\Models\Project;
use App\Models\Proposel;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $admins = Admin::all()->count();
        $user = User::all()->count();
        $users = User::latest()->limit(10)->get();
        $profession = Profession::all()->count();  
        $professions = Profession::latest()->limit(10)->get();
        $skill = Skill::all()->count();
        $skills = Skill::latest()->limit(10)->get();
        $project = Project::all()->count();
        $projects = Project::latest()->limit(10)->get();
        $project_user=Project::where('user_id', '=', auth()->user()->id)->count();
        // dd(Project::where('user_id', '=', auth()->user()->id)->with('proposels')->count());
        $project_proposel=Project::where('user_id', '=', auth()->user()->id)->withCount('proposels')->get();
        $portfolio = Portfolio::where('profession_id', '=', auth()->user()->id)->count();
        $portfolios = Portfolio::where('profession_id', '=', auth()->user()->id)->latest()->limit(10)->get();
        $proposel = Proposel::where('profession_id', '=', auth()->user()->id)->count();
        $proposels = Proposel::where('profession_id', '=', auth()->user()->id)->latest()->limit(10)->get();
        $skillprofession = ProfessionSkill::where('profession_id', '=', auth()->user()->id)->count();
        return Response()->view('cms.dashboard',[
        'admins'=>$admins,'users'=>$users,
        'professions'=>$professions,
        'profession'=>$profession,
        'user'=>$user,'skill'=>$skill,
       'skills'=>$skills,'projects'=>$projects
       ,'project'=>$project,'portfolio'=>$portfolio
       ,'portfolios'=>$portfolios
       ,'proposel'=>$proposel
       ,'proposels'=>$proposels,'project_user'=>$project_user
       ,'skillprofession'=>$skillprofession,'project_proposel'=>$project_proposel

    ]);
    }    
    





}
