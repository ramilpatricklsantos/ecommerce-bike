
@extends('layouts.app')

@section('title')
User List
@endsection

@section('content')

<div class="container">
 <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Type</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $index => $user)
    <tr>
      <td>{{ ++$index }}</td>
      <td>{{ $user->lastname.', '.$user->firstname.' '.$user->middlename }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->type }}</td>
      <td>{{ $user->status }}</td>
      <td>
        @if($user->status == 0)
        <form action="/users/{{ $user->id }}/approve" method="POST">
          @csrf
        <button class="btn btn-primary"><i class="fas fa-check"></i> Approval</button>
        </form>
        @else
        <form action="/users/{{ $user->id }}/edit" method="POST" style="display: inline-block;">
          @csrf
        <button class="btn btn-secondary"><i class="fas fa-edit"></i> Editing</button>
        </form>
        <form action="/users/{{ $user->id }}/delete" method="POST">
          @csrf
        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
        </form>
        @endif
      </td>
    </tr>   
    @endforeach
  </tbody>

</table>

</div>
@endsection




