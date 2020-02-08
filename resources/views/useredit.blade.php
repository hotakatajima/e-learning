@extends('layouts.master')

@section('content')

<div class="container w-50">
    <form action="/useredit" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="formGroupExampleInput">Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{ $show_one->name }}" required> 
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Email</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" name="email" value="{{ $show_one->email }}" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput3">Password</label>
            <input type="password" class="form-control" id="formGroupExampleInput3" name="password" required>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput4">Password Confirm</label>
            <input type="password" class="form-control" id="formGroupExampleInput4" name="password_confirmation" required>
        </div>

        {{-- <div class="form-group">
            <label for="formGroupExampleInput5">Image</label>
        </div> --}}
        <input type="hidden" name="id" value="{{ $show_one->id }}"><br>
        <input type="hidden" name="image" value=""><br>
        <input type="hidden" name="status" value=""><br>

        <div class="form-group text-center">
            <button class="form-control btn btn-warning text-light w-50" type="submit">Submit</button>
        </div>
    </form>
</div>

@endsection