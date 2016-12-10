<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $primaryKey = 'asset_id';

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }
}
