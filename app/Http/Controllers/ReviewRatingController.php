<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\ReviewRating;
use Illuminate\Http\Request;

class ReviewRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rating = ReviewRating::where('profession_id', '=', auth()->user()->id)->get();
        return response()->view('cms.profession.rating',['$rating'=>$$rating]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReviewRating  $reviewRating
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewRating $reviewRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReviewRating  $reviewRating
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewRating $reviewRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReviewRating  $reviewRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReviewRating $reviewRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReviewRating  $reviewRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReviewRating $reviewRating)
    {
        //
    }
}
