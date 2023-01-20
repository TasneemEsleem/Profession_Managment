<?php

namespace App\Http\Controllers;

use App\Models\Proposel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProposelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator($request->all(), [
            'content' => 'required|string|min:3',
            'project_id' => 'string',

        ]);
        if (!$validator->fails()) {
            $proposel = new Proposel();
            $proposel->content = $request->input('content');
            $proposel->project_id = $request->input('project_id');
            $proposel->profession_id = auth()->user()->id;
            $isSaved = $proposel->save();
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
     * @param  \App\Models\Proposel  $proposel
     * @return \Illuminate\Http\Response
     */
    public function show(Proposel $proposel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposel  $proposel
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposel $proposel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposel  $proposel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposel $proposel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposel  $proposel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposel $proposel)
    {
        //
    }
}
