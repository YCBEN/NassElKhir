<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->sortByDesc("created_at");
        
        return  view('homevents',compact('events'));
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
        $request->validate([
            'title'=>['required','unique:posts' ,new Uppercase],
            'description'=>'required',
            //'image'=>'required|mimes:jpg,png,jpeg|max:5040'
            'adress'=>['required','unique:events'],
            'state'=>['required','min:1','max:5']
        ]);


        $event = Event::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'adress'=> $request->adress,
            'state'=> $request->state,
        ]);


        return redirect('/events')->with('event_sent','The event has been sent succesfully, wait for the acceptance');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function oneEvent($id){
        $event = Event::where('id',$id)->first();
        dd($event);
    }

    public function acceptedEvent($id){
        $event = Event::where('id',$id)->update([
            'accepted'=>1
        ]);

        return back()->with('event_accepted',"The event has been Accepted");
        //dd($event);
    }

    public function refusedEvent($id){
        $event = Event::where('id',$id)->update([
            'accepted'=> -1
        ]);

        return back()->with('event_refused',"The event has been Refused");
        //dd($event);
    }


    
    public function pendingEvents(){
        $events = Event::where('accepted',0)->get();
        //dd($event);
        return  view('homevents',compact('events'));
    }

    public function refusedEvents(){
        $events = Event::where('accepted',-1)->get();
        //dd($event);
        return  view('homevents',compact('events'));
    }

    public function acceptedEvents(){
        $events = Event::where('accepted',1)->get()->sortByDesc("state");
        //dd($event);
        return  view('homevents',compact('events'));
    }
}
