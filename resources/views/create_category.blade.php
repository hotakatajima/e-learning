@extends('layouts.master')

@section('content')

<div class="container w-50 bmt-5">
    <form action="/create" method="post">
      <div class="form-group">
        {{ csrf_field() }}
        
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
        @if($errors->has('title'))
          <span class="help-block text-danger">
              <strong>
                  {{ $errors->first('title')}}
              </strong>
          </span><br>
        @endif
        
        <label>Description</label>
        <input type="text" name="description" class="form-control" required>
        @if($errors->has('description'))
          <span class="help-block text-danger">
              <strong>
                  {{ $errors->first('description')}}
              </strong>
          </span>
        @endif  
        
        <div class="buttons mt-5" style="margin-bottom:280px;">
            <a href="/categories" class="form-control float-right bg-dark text-light text-center d-inline-block w-25">Back</a>
            <button type="submit" class="form-control float-right bg-dark text-light text-center d-inline-block w-25">Submit</a>
        </div>
      </div>
    </form>
  </div> 

  @endsection