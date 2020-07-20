@extends('layouts.app') @section('content')
<!-- component matched by the route will render here -->
<h1 class="text-center">Let's Chat</h1>
<br />
<div class="container table-responsive-sm">
    <table class="table table-sm">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Chat Group</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($chatGroups as $group)
            <tr>
                <td>{{$group->id}}</td>
                <td>{{$group->name}}</td>
                <td></td>
                <td class="text-right">
                    <a href="{{ route('join-group', ['groupId' => $group->id])}}" class="btn btn-outline-info" type="button">
                        @if(!$group->user_id ) Join
                        <i class="fa fa-users" aria-hidden="true"></i> @else
                        Let's chat
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        @endif
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection