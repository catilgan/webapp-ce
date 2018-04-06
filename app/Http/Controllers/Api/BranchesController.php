<?php

namespace App\Http\Controllers\Api;

use App\Traits\EmptyDataTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Branch;
use App\Http\Resources\Git\BranchesResource;

class BranchesController extends Controller
{
    use EmptyDataTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Project $project
     * @return array
     */
    public function index(Project $project)
    {
        $gitBranches = new Branch();
        $branches = $gitBranches->get($project->user->name, $project->slug);

        if (!$branches) {
            return $this->returnEmptyData();
        }

        // branches returns array of gitObject
        $array = [];
        foreach ($branches as $branch) {
            $array[] = (new BranchesResource($branch))->toArray();
        }

        return [
            'data' => $array
        ];
    }
}
