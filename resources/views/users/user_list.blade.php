@extends('layouts.app')

@section('title')
    User List
@endsection

{{-- 
  1. Add a button for adding New User
  2. Create a table with the following table headers:
    - #
    - Name
    - Email
    - Type
    - Status
    - Actions
  3. For each row:
    @if the user's status == 0
      - Show the button for Approval
    @else
      - Show the buttons for Editing and Deleting a User
--}}
