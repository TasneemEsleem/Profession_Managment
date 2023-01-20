<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return response()->view('cms.skill.index', ['skills' => $skills]);
    }
    public function create()
    {
        return response()->view('cms.skill.create');
    }
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name_ar' => 'required|string|min:2|max:90',
            'name_en' => 'required|string|min:2|max:90',
            'status' => 'nullable|boolean',
        ]);
        if (!$validator->fails()) {
            $skill = new Skill();
            $skill->name_ar = $request->input('name_ar');
            $skill->name_en = $request->input('name_en');
            $skill->status = $request->input('status');
            $isSaved = $skill->save();
            return response()->json(
                ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,
            );
        }
    }
    public function edit(Skill $skill)
    {
        return response()->view('cms.skill.edit', [
            'skill' => $skill]);    }

            public function update(Request $request,Skill $skill)
            {
                $validator = Validator($request->all(), [
                    'name_ar' => 'required|string|min:2|max:90',
                    'name_en' => 'required|string|min:2|max:90',
                    'status' => 'nullable|boolean',
                ]);
                if (!$validator->fails()) {
                    $skill->name_ar = $request->input('name_ar');
                    $skill->name_en = $request->input('name_en');
                    $skill->status = $request->input('status');
                    $isSaved = $skill->save();
                    return response()->json(
                        ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                        $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
                    );
                } else {
                    return response()->json(
                        ['message' => $validator->getMessageBag()->first()],
                        Response::HTTP_BAD_REQUEST,
                    );
                }
            }
            public function destroy(Skill $skill)
    {
        $deleted = $skill->delete();
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

}
