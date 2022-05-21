
@extends('front.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12 col-lg-6">
            <h1>Store list</h1>
            <ul class="list-group list-group-flush">
                @foreach ($store as $st)
                <li class="list-group-item "> {{ $st->title }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6 ">
            <h1>Store Map</h1>
            <div id="map"></div>
         </div>

    </div>
</div>

@endsection
