<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Archive;
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
            'title'=>'required',
            'description'=>'required',
            //'image'=>'required|mimes:jpg,png,jpeg|max:5040'
            'address'=>'required',
            'state'=>'required'
        ]);
        
        
        $event = Event::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'adress'=> $request->address,
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

    
    public function archivedEvent($id){
        $event = Event::where('id',$id)->first();

        if(Archive::where('id_event',$event->id)->exists()){

            return redirect('/events')->with('event_archived','The event has been already archived.');
        }else{
            $event = Archive::create([
                'id_event'=>$event->id,
                'title'=> $event->title,
                'description'=> $event->description,
                'adress'=> $event->adress,
                'state'=> $event->state,
                'accepted'=> $event->accepted,
            ]);
            return redirect('/events')->with('event_archived','The event has been archived succesfully.');
            
        }
        
       

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
