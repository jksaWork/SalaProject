<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FrequentlyAskedQuestion;
use App\Models\FrequentlyAskedQuestionsTable;
use Illuminate\Support\Facades\DB;

class FrequentlyAskedQuestionsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = DB::table('_f_a_q')->paginate(5);
        return view('Admin.FAQ.index', compact('faq'));
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
     * @param  \App\Models\FrequentlyAskedQuestionsTable  $frequentlyAskedQuestionsTable
     * @return \Illuminate\Http\Response
     */
    public function show(FrequentlyAskedQuestionsTable $frequentlyAskedQuestionsTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrequentlyAskedQuestionsTable  $frequentlyAskedQuestionsTable
     * @return \Illuminate\Http\Response
     */
    public function edit(FrequentlyAskedQuestionsTable $frequentlyAskedQuestionsTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrequentlyAskedQuestionsTable  $frequentlyAskedQuestionsTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrequentlyAskedQuestionsTable $frequentlyAskedQuestionsTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrequentlyAskedQuestionsTable  $frequentlyAskedQuestionsTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrequentlyAskedQuestionsTable $frequentlyAskedQuestionsTable)
    {
        //
    }
}
