@extends('layouts.master')

@section('content')

<div class="container mt-5 w-50">
    <form action="/category/{{ $num }}/create/words" method="post">
      <div class="form-group">
        {{ csrf_field() }}
        
        <label>Word</label>
        <input type="text" name="word" class="form-control" required><hr>
        @if($errors->has('word'))
          <span class="help-block text-danger">
              <strong>
                  {{ $errors->first('word')}}
              </strong>
          </span><br>
        @endif
        
        <label>Choices1</label>
        <input type="text" name="choice[]" class="form-control" required>
        <input type="radio" name="correct" value="0"><br>

        <label>Choices2</label>
        <input type="text" name="choice[]" class="form-control" required>
        <input type="radio" name="correct" value="1"><br>

        <label>Choices3</label>
        <input type="text" name="choice[]" class="form-control" required>
        <input type="radio" name="correct" value="2"><br>

        @if($errors->has('choice'))
          <span class="help-block text-danger">
              <strong>
                  {{ $errors->first('choice')}}
              </strong>
          </span><br>
        @endif
        
        <div class="buttons mt-5" style="margin-bottom:280px;">
            <a href="/category/{{ $num }}/word" class="form-control float-right bg-dark text-light text-center d-inline-block w-25">Back</a>
            <button type="submit" class="form-control float-right bg-dark text-light text-center d-inline-block w-25">Submit</a>
        </div>
      </div>
    </form>
  </div> 

  @endsection