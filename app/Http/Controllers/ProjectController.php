<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    		$link = new Link;
    		$link->link_text = $request->value['link_text'];
    		$link->link_url = $request->value['link_url'];
    		$link->project_id = $project->project_id;
    		$link->save();
    		return $project->json();
    	}

    	$project[$request->key] = $request->value;

    	$project->save();

    	return $project->json();
    	
    }

}
