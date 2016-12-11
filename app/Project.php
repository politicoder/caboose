<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

	protected $primaryKey = 'project_id';
    protected $fillable = ['name', 'basecamp_url', 'invision_url', 'invision_password', 'staging_url'];

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
