@extends('layouts.master')

@section('content')

<div class="container w-50">
    <form action="/useredit" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')

        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{ $show_one->name }}" required> 
        </div>
        @if($errors->has('name'))
            <span class="help-block text-danger">
                <strong>
                    {{ $errors->first('name')}}
                </strong>
            </span>
        @endif  

        <div class="form-group">
          <label for="formGroupExampleInput2">Email</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" name="email" value="{{ $show_one->email }}" required>
        </div>
        @if($errors->has('email'))
            <span class="help-block text-danger">
                <strong>
                    {{ $errors->first('email')}}
                </strong>
            </span>
        @endif  

        <div class="form-group">
            <label for="formGroupExampleInput3">Password</label>
            <input type="password" class="form-control" id="formGroupExampleInput3" name="password" required>
        </div>
        @if($errors->has('password'))
            <span class="help-block text-danger">
                <strong>
                    {{ $errors->first('password')}}
                </strong>
            </span>
        @endif  

        <div class="form-group">
            <label for="formGroupExampleInput4">Password Confirm</label>
            <input type="password" class="form-control" id="formGroupExampleInput4" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput5">Image</label><br>
            @if(Auth::user()->image)
                <img src="/avatars/{{ Auth::user()->image }}" alt="" width="200" height="200" class="rounded-circle">
            @else
                <img src="/avatars/black.png" alt="" width="150" height="150"  class="rounded-circle mb-3">
            @endif
            <input type="file" name="avatar" id="formGroupExampleInput5" class="ml-5"><br>
            @if($errors->has('avatar'))
                <span class="text-danger">
                    <strong>
                        {{ $errors->first('avatar')}}
                    </strong>
                </span>
            @endif
        </div>
        <input type="hidden" name="id" value="{{ $show_one->id }}"><br>

        <div class="form-group text-center">
            <button class="form-control btn btn-warning text-light w-50" type="submit">Submit</button>
        </div>
    </form>
</div>

@endsection