@extends ('layouts.master')

@section ('layout-main-classes', 'container')
@section ('layout-body-classes', 'mt-5 pt-3 mb-3')

@section('javascripts')
<script src="{{ mix('/js/mix/spaces.bundle.js') }}"></script>
@endsection

@section ('projects-table')
<images-browser space-id="{{ $space->id }}" path="{{ $path }}"></images-browser>
@endsection

@section ('content')
<h1 class="h2" style="font-weight: 300">
    <svg class="svg-inline--fa fa-dot-circle fa-w-16" aria-hidden="true" data-prefix="far" data-icon="dot-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 56c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m0-48C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 168c-44.183 0-80 35.817-80 80s35.817 80 80 80 80-35.817 80-80-35.817-80-80-80z"></path></svg>
    {{ $space->name }}
</h1>
@auth

@endauth

@yield ('projects-table')

@endsection
