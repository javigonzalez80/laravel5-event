<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Event extends Model
{
    protected $table = 'events';
	
	protected $dates = ['start_time', 'end_time'];
	
	protected $fillable = ['title', 'slug', 'description', 'location', 'image', 'start_time', 'end_time'];
	
	public function setStartTimeAttribute($date)
	{
		$this->attributes['start_time'] = Carbon::createFromFormat('Y-m-d H:i', $date);
	}
	
	public function getStartTimeAttribute($date)
	{
		return new Carbon($date);
	}
	
	public function setEndTimeAttribute($date)
	{
		$this->attributes['end_time'] = Carbon::createFromFormat('Y-m-d H:i', $date);
	}
	
	public function getEndTimeAttribute($date)
	{
		return new Carbon($date);
	}
	
}
