@extends('layouts.app')

@section('title')
User Details Update
@endsection
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">User Edit</div>

        <div class="card-body">
          
         
          <form method="POST" action="/users/{{ $user->id }}/update">
            @csrf
           
            <!-- FIRSTNAME -->
            <div class="form-group row">
              <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name:') }}</label>

              <div class="col-md-6">
                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ $user->firstname }}"  required autofocus>

                @if ($errors->has('firstname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('firstname') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <!-- MIDDLE NAME -->
            <div class="form-group row">
              <label for="middlename" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name:') }}</label>

              <div class="col-md-6">
                <input id="middlename" type="text" class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}" name="middlename" value="{{ $user->middlename }}"  required autofocus>

                @if ($errors->has('middlename'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('middlename') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <!-- LAST NAME -->
            <div class="form-group row">
              <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name:') }}</label>

              <div class="col-md-6">
                <input id="lastname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="lastname" value="{{ $user->lastname }}"  required autofocus>

                @if ($errors->has('lastname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('lastname') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <!-- EMAIL ADDRESS -->
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}"  required>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <!-- PASSWORD -->
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password:') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ $user->email }}"  required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password:') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  required>
                
              </div>
            </div>

            <!-- TYPE -->
            <div class="form-group row">
              <label for="type" class="col-md-4 col-form-label text-md-right">{{ __(' Type:') }}</label>

              <div class="col-md-6">
                <select name="type" class=" form-control">
                  <option >Select .. </option>
                  <option value="admin">admin</option>
                  <option value="guest">guest</option>
                </select>

                @if ($errors->has('type'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('type') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <hr>
            <button class="btn btn-primary form-control" type="submit"> Update</button>
</form>

</div>
</div>
</div>
</div>
</div>




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
