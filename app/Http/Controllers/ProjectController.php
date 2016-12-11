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
    		'name' => $project->name,
    		'user' => $project->user->name
    	];
    	return $output;
    }

}
