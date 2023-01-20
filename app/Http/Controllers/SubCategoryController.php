<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(SubCategory::class, 'subcategory');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Category::all();
        $subcategories = SubCategory::with('category')->get();
        return response()->view('cms.subcategory.index', [
            // 'categories' => $categories,
            'subcategories'=>$subcategories
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return response()->view('cms.subcategory.create',['categories'=>$categories]);
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
            'name_ar' => 'required|string|min:2|max:90',
            'name_en' => 'required|string|min:2|max:90',
            'status' => 'nullable|boolean',
            'category_id' => 'required|numeric|exists:categories,id',

        ]);
        if (!$validator->fails()) {
            $subcategory = new SubCategory();
            $subcategory->name_ar = $request->input('name_ar');
            $subcategory->name_en = $request->input('name_en');
            $subcategory->category_id = $request->input('category_id');
            $subcategory->status = $request->input('status');
            $isSaved = $subcategory->save();
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return response()->view('cms.subcategory.edit', [
            'categories' => $categories,
        'subcategory'=>$subcategory
        ]);    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        $validator = Validator($request->all(), [
            'name_ar' => 'required|string|min:2|max:90',
            'name_en' => 'required|string|min:2|max:90',
            'status' => 'nullable|boolean',
            'category_id' => 'required|numeric|exists:categories,id',

        ]);
        if (!$validator->fails()) {
            $subcategory->name_ar = $request->input('name_ar');
            $subcategory->name_en = $request->input('name_en');
            $subcategory->category_id = $request->input('category_id');
            $subcategory->status = $request->input('status');
            $isSaved = $subcategory->save();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $deleted = $subcategory->delete();
        return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Delete failed!'],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
