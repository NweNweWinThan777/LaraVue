@extends('layouts.app') @section('content')
<!-- component matched by the route will render here -->
<h1 class="text-center">Welcome to our {{ $groupTitle }}</h1>
<br />
<div class="container h-100">
    <div class="col-2 border">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
    </div>
    <div class="col-10 border"></div>
</div>
@endsection