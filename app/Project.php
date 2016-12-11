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

    public function json()
    {
        $output = [
            'id' => $this->project_id,
            'name' => $this->name,
            'user' => $this->user->name,
            'basecamp_url' => $this->basecamp_url,
            'invision_url' => $this->invision_url,
            'invision_password' => $this->invision_password,
            'staging_url' => $this->staging_url,
            'links' => []
        ];

        foreach($this->links as $link) {
            $output['links'][] = [
                'link_text' => $link->link_text,
                'link_url' => $link->link_url
            ];
        }

        return $output;
    }


}
