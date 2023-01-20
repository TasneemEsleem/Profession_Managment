<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Proposel;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectView(){
        $projects = Project::all();
        return response()->view('cms.project.viewAll', [
            'projects' => $projects
        ]);
    }
    public function index()
    {
        // dd();
        $projects = Project::where('user_id', '=', auth()->user()->id)->get();
        return response()->view('cms.project.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', '=', true)->get();
        $subcategories = SubCategory::where('status', '=', true)->get();;

        return response()->view('cms.project.create', [
            'categories' => $categories, 'subcategories' => $subcategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
            'description' => 'nullable|string',
            'duration_date' => 'nullable|string',
            'status' => 'required | boolean',
            'category_id' => 'required|numeric|exists:categories,id',
            'subcategory_id' => 'required|numeric|exists:sub_categories,id',
        ]);
        if (!$validator->fails()) {
            $project = new Project();
            $project->title = $request->input('title');
            $project->description = $request->input('description');
            $project->price = $request->input('price');
            $project->category_id = $request->input('category_id');
            $project->subcategory_id = $request->input('subcategory_id');
            $project->duration_date = $request->input('duration_date');
            $project->status = $request->input('status');
            $project->user_id = auth()->user()->getAuthIdentifier();
            $isSaved = $project->save();

            return response()->json(
                ['message' => $isSaved ? __('cms.create_success') : __('cms.create_failed')],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $categories = Category::where('status', '=', true)->get();
        $subcategories = SubCategory::where('status', '=', true)->get();
        // dd(Proposel::where('project_id', '=', $project->id)->with('profession')->get());
        $proposels = Proposel::where('project_id', '=', $project->id)->with('profession')->get();
        return response()->view('cms.project.show', [
            'project' => $project, 'categories' => $categories, 'subcategories' => $subcategories,
            'proposels'=>$proposels
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::where('status', '=', true)->get();
        $subcategories = SubCategory::where('status', '=', true)->get();;

        return response()->view('cms.project.edit', [
            'categories' => $categories, 'subcategories' => $subcategories, 'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
            'description' => 'nullable|string',
            'duration_date' => 'nullable|string',
            'status' => 'required | boolean',
            'category_id' => 'required|numeric|exists:categories,id',
            'subcategory_id' => 'required|numeric|exists:sub_categories,id',
        ]);
        if (!$validator->fails()) {
            $project->title = $request->input('title');
            $project->description = $request->input('description');
            $project->price = $request->input('price');
            $project->category_id = $request->input('category_id');
            $project->subcategory_id = $request->input('subcategory_id');
            $project->duration_date = $request->input('duration_date');
            $project->status = $request->input('status');
            $project->user_id = auth()->user()->id;
            $isSaved = $project->save();

            return response()->json(
                ['message' => $isSaved ? __('cms.edit_success') : __('cms.edit_failed')],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                [
                    'message' => $validator->getMessageBag()->first()
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $deleted = $project->delete();
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
    
}
