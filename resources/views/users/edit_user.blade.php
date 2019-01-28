@extends('layouts.app')

@section('title')
    User Details Update
@endsection

{{--  
  1. Add a form to Edit the User Details. Include Form validations
    **Tips: 
      - When dealing with forms, always include @csrf
      - In this form, add a @method('PATCH')
    - Input for Name
    - Input for Email
    - Input for Password
    - Input for Confirm Password
    - Select Input for User Roles
    - A button to update the User Details

  Notes: Make sure when updating Password and Confirm Password, they must be matched.
--}}
