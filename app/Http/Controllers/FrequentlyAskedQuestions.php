<?php

namespace App\Http\Controllers;

use SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FrequentlyAskedQuestion;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class FrequentlyAskedQuestions extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $questions = DB::table('_f_a_q')->paginate(5);
        // this->$modal = $modal;
        return view('admin.faq.AdminFAQ', compact('questions'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        // dd($request);
        FrequentlyAskedQuestion::create([
            'id' => $request->id,
            'question' => $request->question,
            'answer' => $request->content,
        ]);

        return redirect('FAQ');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;

        $fq = FrequentlyAskedQuestion::find($id);
        $fq->update(['question' => $request->question, 'answer' => $request->answer]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        FrequentlyAskedQuestion::find($id)->delete();
        return redirect()->back();
    }
}
