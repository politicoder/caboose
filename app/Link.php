<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

	protected $primaryKey = 'link_id';

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }
}
