<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Topic;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if()
        if(IsClient()){
            $allTicket = Ticket::where('client_id' , auth()->user()->id)->paginate(10);
        }else{
            $allTicket = Ticket::paginate(10);
        }
        return view('support.index' , compact('allTicket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('support.create' , compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ticket::create([
            'subject' => $request->subject ,
            'topic_id' => $request->topic_selected,
            'client_id' => auth()->user()->id,
            'status' =>'pending',
        ]);
        // return $request;
        return redirect()->route('technical.support');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(IsClient()){
            $data =   Ticket::with('Messages')->find($id);
            $tickets = Ticket::where('client_id' , auth()->user()->id)->get();
        }else{
            $data =   Ticket::with('Messages')->find($id);
            $tickets = Ticket::limit(10)->get();
        }

        // dd($ticket);
        return view('support.messages' , compact('data' , 'id' , 'tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
