@extends ('layouts.master')

@section ('layout-main-classes', 'container')
@section ('layout-body-classes', 'mt-5 pt-3 mb-3')

@section('javascripts')
<script src="{{ mix('/js/mix/projects.bundle.js') }}"></script>
@endsection

@section ('content')

<div class="row justify-content-center">
    <div class="col-9">
        
    <h1 class="display-4">New Space</h1>
    @include('elements.errors')

    <form action="/projects/{{ $project->id }}/spaces" method="post">

        {{ csrf_field() }}

        <div class="row">
            <div class="col-6">
                <div class="form-group row">
                    <label class="col-12 form-control-label" for="name">Name</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Project name">
                    </div>
                </div>
            </div>
        </div>

        @if(license_check('private_spaces'))
        <div class="row mb-2">
            <div class="col-6">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="private"  name="private">
                    <label class="form-check-label" for="private">Private</label>
                </div>
            </div>
        </div>
        @endif()

        <div class="form-group row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Create space</button>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection