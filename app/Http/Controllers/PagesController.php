<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

use Carbon\Carbon;

class PagesController extends Controller
{
    /**
     * Display Homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage()
    {
        return view('pages.homepage');
    }
	
	/**
	 * Display Errorpage.
	 *
	 * @return \Illuminate\Http\Response
	 */
	Public function error()
	{
		return view('errors.pageerror');
	}
	
	/**
	 * Display Calendar.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function eventcalendar()
	{
		return view('pages.calendar');
	}
	
	/**
	 * Display all Events.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function eventlist()
	{
		$events = Event::all();
		
		return view('pages.list', compact('events'));
	}
	
	/**
	 * Display single Event.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function event($slug)
	{
		$event = Event::where('slug', $slug)->first();
		
		return view('pages.event', compact('event'));
	}
	
	/**
	 * FullCalendar Api 
	 *
	 */
	
	public function fullcalendar()
	{
		
		$data = array(); 
        $id = Event::all()->pluck('id'); 
        $title = Event::all()->pluck('title'); 
		$slug = Event::all()->pluck('slug'); 
		$description = Event::all()->pluck('description'); 
		$location = Event::all()->pluck('location'); 
		$image = Event::all()->pluck('image'); 
		$start = Event::all()->pluck('start_time'); 
		$end = Event::all()->pluck('end_time'); 
        $count = count($id); 
 
        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                'title' => $title[$i], 
				'start' => (new Carbon($start[$i]))->toDateTimeString(),
				'end' => (new Carbon($end[$i]))->toDateTimeString(),
                'url' => "http://localhost/laravel5-event/public/event/".$slug[$i]
            );
        }
 
        json_encode($data); 
		
		
        return $data; 
		
	}
}
