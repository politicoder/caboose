<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

	protected $primaryKey = 'project_id';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function links()
    {
    	return $this->hasMany('App\Link');
    }
    public function assets()
    {
    	return $this->hasMany('App\Asset');
    }
}
