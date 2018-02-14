<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'n1' => 'required',
            'n2' => 'required',
            's' => 'required',
        ]);

        $slug = hash('sha256', $request->n1.$request->n1.date('d.m.Y H:i:s').rand(1,100000));
        $score = Score::create([
            'name_one' => $request->n1,
            'name_two' => $request->n2,
            'score' => $request->s,
            'submitter' => $request->ip(),
            'slug' => $slug,
        ]);
        return response('');
    }

    /**
     * Display the specified resource.
     *
     * @param  Score  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        return view('result', compact('score'));
    }
}
