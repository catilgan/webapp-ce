<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Page;

class CmsController extends Controller
{
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Project $project)
    {
        return view('cms.index', compact('project'));
    }

    /**
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Project $project)
    {
        return view('cms.pages.create', compact('project'));
    }

    /**
     * @param Page $page
     * @return string
     */
    public function edit(Page $page)
    {
        return ('cms.pages.edit');
    }

    /**
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Project $project)
    {
        $project->createPage(new Page([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'user_id' => auth()->user()->id
        ]));

        return back();
    }
}
