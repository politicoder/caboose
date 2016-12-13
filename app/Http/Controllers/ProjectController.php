<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Link;

class ProjectController extends Controller
{
	public function newProject(Request $request) {

		$output = [];

		if (sizeof(Project::where('name','=',$request->name)->get()) > 0) {
			$output['success'] = 0;
    		$output['error'] = 1; // Name already taken
    		return $output;
    	}

    	$np = new Project;
    	$np->name = $request->name;
    	$np->user_id = $request->user_id;

    	$np->save();

    	$output['success'] = 1;
    	$output['new_project_id'] = $np->project_id;

    	return $output;

    }

    public function showProject($id) {
    	$project = Project::where('project_id','=',$id)->first();
    	return $project->json();
    }

    public function editProject($id, Request $request) {

    	$project = Project::where('project_id','=',$id)->first();

    	if ($request->key == 'link') {
            $url = substr($request->value['link_url'], 0, 4) != 'http' ? 'http://'.$request->value['link_url'] : $request->value['link_url'];
    		$link = new Link;
    		$link->link_text = $request->value['link_text'];
    		$link->link_url = $url;
    		$link->project_id = $project->project_id;
    		$link->save();
    		return $project->json();
    	}

        
        // Catch-all for the other types of links
        $url = substr($request->value, 0, 4) != 'http' ? 'http://'.$request->value : $request->value;
    	$project[$request->key] = $url;

    	$project->save();

    	return $project->json();
    	
    }

}
