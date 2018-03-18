@extends ('layouts.master-with-sidebar')

@section ('layout-main-classes', 'container limit-container-width')
@section ('layout-body-classes', 'mt-5 pt-3 mb-3')

@section ('sidebar-content')
<div class="context-header">
<a href="#">
    <div class="avatar-container" style="min-height: 50px">
    </div>
    <div class="sidebar-context-title">
        {{ $project->name }}
    </div>
</a>
</div>
@include('projects.elements.sidebar')
@endsection

@section('javascripts')
<script src="{{ mix('/js/mix/spaces.bundle.js') }}"></script>
@endsection

@section ('content')
<h1 class="h2" style="font-weight: 300">
<i class="far fa-book"></i>
    {{ $project->name }}<small> by {{ $project->user->profile->name }}</small>
</h1>

<div class="row">
    <div class="col-12">
        <p class="lead has-emoji">{{ $project->description }}</p>
    </div>
</div>

<div class="row" style="margin-bottom: 10px">
    <div class="col-12 text-right">
    <a href="/projects/{{ $project->id }}/spaces/new" class="btn btn-success">Create new space</a>
    </div>
</div>

<div class="row" style="margin-bottom: 3rem">
    <div class="col-12">
    <project-spaces-table-component project-id="{{ $project->id }}"></project-spaces-table-component>
    </div>
</div>
@endsection
