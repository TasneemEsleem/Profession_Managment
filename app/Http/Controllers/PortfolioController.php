<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::where('profession_id', '=', auth()->user()->id)->get();
        return response()->view('cms.portfolio.index', ['portfolios' => $portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.portfolio.create');
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
            'description' => 'string',
            'completion_date' => 'required|date',
            'status' => 'required | boolean',
            'main_image' => 'required|image|mimes:png,jpg,jpeg',
            'image_1' => 'required|image|mimes:png,jpg,jpeg',
            'image_2' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_3' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_4' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_5' => 'nullable', 'image|mimes:png,jpg,jpeg',
        ]);
        if (!$validator->fails()) {
            $portfolio = new Portfolio();
            $portfolio->title = $request->input('title');
            $portfolio->description = $request->input('description');
            $portfolio->completion_date = $request->input('completion_date');
            $portfolio->status = $request->input('status');
            $portfolio->profession_id = auth()->user()->getAuthIdentifier();
            if ($request->hasFile('main_image')) {
                $imagetitle =  time() . '_' . str_replace(' ', '', $portfolio->title) . '.' . $request->file('main_image')->extension();
                $request->file('main_image')->storePubliclyAs('portfolio', $imagetitle, ['disk' => 'public']);
                $portfolio->main_image = 'portfolio/' . $imagetitle;
            }
            $isSaved = $portfolio->save();
            if ($isSaved) {
                $this->saveImage($request, $portfolio, 'image_1');
                $this->saveImage($request, $portfolio, 'image_2');
                $this->saveImage($request, $portfolio, 'image_3');
                $this->saveImage($request, $portfolio, 'image_4');
                $this->saveImage($request, $portfolio, 'image_5');
            }
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
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return response()->view('cms.portfolio.show', [
            'portfolio' => $portfolio,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return response()->view('cms.portfolio.edit', [
            'portfolio' => $portfolio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validator = Validator($request->all(), [
            'title' => 'required|string|min:3',
            'description' => 'string',
            'completion_date' => 'required|date',
            'status' => 'required | boolean',
            'main_image' => 'image|mimes:png,jpg,jpeg',
            'image_1' => 'image|mimes:png,jpg,jpeg',
            'image_2' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_3' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_4' => 'nullable', 'image|mimes:png,jpg,jpeg',
            'image_5' => 'nullable', 'image|mimes:png,jpg,jpeg',
        ]);
        if (!$validator->fails()) {
            $portfolio->title = $request->input('title');
            $portfolio->description = $request->input('description');
            $portfolio->completion_date = $request->input('completion_date');
            $portfolio->status = $request->input('status');
            $portfolio->profession_id = auth()->user()->getAuthIdentifier();
            if ($request->hasFile('main_image')) {
                $imagetitle =  time() . '_' . str_replace(' ', '', $portfolio->title) . '.' . $request->file('main_image')->extension();
                $request->file('main_image')->storePubliclyAs('portfolio', $imagetitle, ['disk' => 'public']);
                $portfolio->main_image = 'portfolio/' . $imagetitle;
            }
            $isSaved = $portfolio->save();
            if ($isSaved) {
                $this->saveImage($request, $portfolio, 'image_1');
                $this->saveImage($request, $portfolio, 'image_2');
                $this->saveImage($request, $portfolio, 'image_3');
                $this->saveImage($request, $portfolio, 'image_4');
                $this->saveImage($request, $portfolio, 'image_5');
            }
            return response()->json(
                ['message' => $isSaved ? __('cms.update_success') : __('cms.update_failed')],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if (!$portfolio->profession_id != auth()->user()->id) {

            $deleted = $portfolio->delete();
            if ($deleted) {
                Storage::delete($portfolio->main_image);
                $this->deleteImages($portfolio);
            }
            return response()->json(
                ['message' => $deleted ? 'Deleted successfully' : 'Delete failed!'],
                $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ['message' => 'You Can\'t Delete Your Self '],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    private function deleteImages(Portfolio $portfolio)
    {
        foreach ($portfolio->images as $image) {
            Storage::disk('public')->delete('portfolio/' . $image->name);
            $image->delete();
        }
    }

    private function saveImage(Request $request, Portfolio $portfolio, String $key, bool $update = false)
    {
        if ($request->hasFile($key)) {
            if ($update) {
                foreach ($portfolio->images as $image) {
                    if (str_contains($image->name, $key)) {
                        Storage::disk('public')->delete('portfolio/' . $image->name);
                        $image->delete();
                    }
                }
            }
            $imageName = time() . '_' . str_replace(' ', '', $portfolio->name) . "_portfolio_$key." . $request->file($key)->extension();
            $request->file($key)->storePubliclyAs('portfolio', $imageName, ['disk' => 'public']);

            $image = new Image();
            $image->name = $imageName;
            $image->url = 'portfolio/' . $imageName;
            $portfolio->images()->save($image);
        }
    }
}
