<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

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
    	$output = [
    		'id' => $project->project_id,
    		'name' => $project->name,
    		'user' => $project->user->name,
    		'basecamp_url' => $project->basecamp_url,
    		'invision_url' => $project->invision_url,
    		'invision_password' => $project->invision_password,
    		'staging_url' => $project->staging_url
    	];
    	return $output;
    }

    public function editProject($id, Request $request) {
    	$project = Project::where('project_id','=',$id)->first();

    	$project[$request->key] = $request->value;
    	$project->save();

    	return $project;
    	
    }

}
