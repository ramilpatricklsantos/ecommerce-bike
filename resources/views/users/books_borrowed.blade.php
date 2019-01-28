@extends('layouts.app')

@section('title')
    Borrowed Book List
@endsection

{{-- 
  1. Add a Table for the borrowed books with the ff. headers:
    - #
    - Name
    - Quantity
    - Borrowed Date
    - Actions

    @for each book
      - Display the #
      - Display the name
      - Display the quantity
      - Display the borrowed date
      - Add an action button for returning the book

    @if the table is empty
      - Show a message that there are no borrowed books to show

--}}