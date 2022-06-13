<?php

namespace App\Http\Controllers;

use App\Models\TiketMessage;
use Illuminate\Http\Request;

class TiketMessageController extends Controller
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
        // return $request;
        $validaotr = validator($request->all(), [
            'text' => 'required',
        ]);
        if ($validaotr->fails()) return redirect()->back()->withErrors($validaotr->errors());
        // $senderArray =   [] ;
        // dd();

        TiketMessage::create([
            'content' => $request->text,
            'ticket_id' => $request->ticket_id,
            IsClient() ? 'sender' : 'admin_id' => auth()->user()->id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TiketMessage  $tiketMessage
     * @return \Illuminate\Http\Response
     */
    public function show(TiketMessage $tiketMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TiketMessage  $tiketMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(TiketMessage $tiketMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TiketMessage  $tiketMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiketMessage $tiketMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TiketMessage  $tiketMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TiketMessage $tiketMessage)
    {
        //
    }
}
