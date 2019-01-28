@extends('layouts.app')

@section('title')
    Book Details
@endsection

{{--  
  1. Add a form to Edit the Book Details. Include Form validations
    **Tips: 
      - When dealing with forms, always include @csrf
    - Input for ISBN
    - Input for Book Name
    - Input for Category
    - Input for Available Stock
    - Input for Description
    - A button for disabling / enabling a book
    - A button to update the User Details

  Notes: disable books instead of deleting them.
--}}