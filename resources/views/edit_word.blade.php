@extends('layouts.master')

@section('content')

<div class="container w-50 mt-5">
    <form action="/category/{{ $edits->category->id }}/edit/{{ $edits->id }}" method="post">
      <div class="form-group">
        {{ csrf_field() }}
        @method('PATCH')
        
        <label>Word</label>
        <input type="text" name="text" class="form-control" value="{{ $edits->text }}" required>
        @if($errors->has('text'))
          <span class="help-block text-danger">
              <strong>
                  {{ $errors->first('text')}}
              </strong>
          </span><br><br>
        @else
          <br><br>
        @endif

        @foreach ($edits->word_answers as $key => $word_answer)
            <label>Choices {{ $key + 1}}</label>
            <input type="text" name="{{ $key }}" class="form-control" value="{{ $word_answer->text }}" required>
            <input type="radio" name="correct" value="{{ $key }}" {{ $word_answer->is_correct ? "checked" : "" }}><br>
            <input type="hidden" name="word_answer_num_{{ $key }}" value="{{ $word_answer->id }}">
        @endforeach
        @if($errors->has('0'))
          <span class="help-block text-danger">
              <strong>
                  {{ $errors->first('0') }}
              </strong>
          </span><br>
        @elseif($errors->has('1'))
          <span class="help-block text-danger">
            <strong>
                {{ $errors->first('1') }}
            </strong>
          </span><br>
        @else
          <span class="help-block text-danger">
            <strong>
                {{ $errors->first('2') }}
            </strong>
          </span><br>
        @endif
        
        <div class="buttons mt-5" style="margin-bottom:280px;">
            <a href="/category/{{ $edits->category->id }}/word" class="form-control float-right bg-dark text-light text-center d-inline-block w-25">Back</a>
            <button type="submit" class="form-control float-right bg-dark text-light text-center d-inline-block w-25">Submit</a>
        </div>

      </div>
    </form>
  </div> 

  @endsection