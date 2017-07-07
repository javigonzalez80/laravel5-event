<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Event;

class EventsController extends Controller
{
    
	public function __construct()
	{
		$this->middleware('auth');
	} 
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('start_time', 'DESC')->get();
		
		return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
		

		$event = new Event;
		$event->title = $request->get('title');
		$event->slug = $request->get('slug');
		$event->description = $request->get('description');
		$event->location = $request->get('location');
		
		$map_address = $request->get('location');
		$url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($map_address);
		$lat_lng = get_object_vars(json_decode(file_get_contents($url)));
		
		$lat = $lat_lng['results'][0]->geometry->location->lat;
		$lng = $lat_lng['results'][0]->geometry->location->lng;

		$event->lat = $lat;
		$event->lng = $lng;
		
		$event->start_time = $request->get('start_time');
		$event->end_time = $request->get('end_time');
			
		$image = $request->file('image');
		$destinationPath = public_path().'/img/uploads/';
		$filename = $image->getClientOriginalName();
		$request->file('image')->move($destinationPath, $filename);
			
		$event->image = $filename;
		$event->save();
		
		return redirect('admin/events')->with('flash_message', 'Event has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
		
		return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
		
		return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, EventRequest $request)
    {
        $event = Event::findOrFail($id);
		$event->title = $request->get('title');
		$event->slug = $request->get('slug');
		$event->description = $request->get('description');
		$event->location = $request->get('location');
		
		$map_address = $request->get('location');
		$url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=".urlencode($map_address);
		$lat_lng = get_object_vars(json_decode(file_get_contents($url)));
		
		$lat = $lat_lng['results'][0]->geometry->location->lat;
		$lng = $lat_lng['results'][0]->geometry->location->lng;
		
		$event->lat = $lat;
		$event->lng = $lng;
		
		$event->start_time = $request->get('start_time');
		$event->end_time = $request->get('end_time');
			
		$image = $request->file('image');
		$destinationPath = public_path().'/img/uploads/';
		$filename = $image->getClientOriginalName();
		$request->file('image')->move($destinationPath, $filename);
			
		$event->image = $filename;
		$event->save();
		
		return redirect('admin/events')->with('flash_message', 'Event has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
		
		$event->delete();

		return redirect('admin/events')->with('flash_message', 'Event has been deleted!');
    }
}
