<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Profession;
use App\Models\ProfessionSkill;
use App\Models\Profile;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = Profession::all();
        return response()->view('cms.profession.index', [
            'professions' => $professions
        ]);
    }

    public function allProfession()
    {
        $professions = Profession::all();

        return response()->view(
            'cms.profession.allProfession',
            [
                'professions' => $professions
            ]
        );
    }
    public function Notarized($id)
    {
        $profession = Profession::Where('id', '=', $id)->first();
        $profession->notarized = !$profession->notarized;
        $profession->save();
        return response()->json(
            ['message' => $profession ? 'Change notarized successfully' : 'Change notarized failed!'],
            $profession ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }

    public function reviewstore(Request $request)
    {
        $validator = Validator($request->all(), [
            'comments' => 'string|min:2|max:90',
            'star_rating' => 'required|int',
        ]);
        $check_rating = ReviewRating::where('profession_id', $request->profession_id)->where('user_id', auth()->user()->id)->first();
        if ($check_rating) {
            // user has already added a rating for this product
            // return an error message or redirect
            return response()->json(['message' => 'You have already left a rating for this product'], 403);
        } else {
            if (!$validator->fails()) {
                $review = new ReviewRating();
                $review->comments = $request->comments;
                $review->star_rating = $request->star_rating;
                $review->user_id = auth()->user()->id;
                $review->profession_id = $request->profession_id;
                $isSaved = $review->save();
                return response()->json(
                    ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
                    $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST
                );
            }
        }

        // return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
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
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        if (is_null($profession)) {
            return response()->json([
                'message' => 'User Not Have Data',
                'status' => 404
            ], 404);
        }
        // dd(Portfolio::where('profession_id', '=', $profession->id)->first());

        $profile = Profile::where('profession_id', '=', $profession->id)->with('profession')->first();
        $portfolios = Portfolio::where('profession_id', '=', $profession->id)->get();
        $profession_skills = ProfessionSkill::Where('profession_id', '=', $profession->id)->with('skills')->get();
        $ratings = ReviewRating::where('profession_id', '=', $profession->id)->get();
        // dd($rating);
        return response()->view('cms.profession.show', [
            'profile' => $profile, 'portfolios' => $portfolios, 'profession_skills' => $profession_skills,
            'ratings' => $ratings
        ]);
    }
    public function showPortfolio(Portfolio $portfolio)
    {
        return response()->view('cms.profession.showPortfolio', [
            'portfolio' => $portfolio,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        //
    }
}
