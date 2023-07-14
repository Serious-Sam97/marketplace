@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div name="app">
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>
@endsection
