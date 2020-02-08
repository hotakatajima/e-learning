@extends('layouts.master')

@section('content')

    <div class="container w-50 mt-3">
        
        <h2 class="d-inline">{{ $categories->title }}</h2>

        @php
            $int = $_GET['id'];
            $array_num = $int - 1;
        @endphp

        <h3 class="float-right">{{$int}}/{{ $categories->words->count() }}</h3>
        <div class="card mt-5 mb-5">
            <div class="card-header">
                <p class="display-4 text-center">{{ $categories->words[$array_num]->text }}</p>
                    
                @if ( $int == $categories->words->count() )
                    @foreach ($categories->words[$array_num]->word_answers as $word_answer)
                        <form action="/lesson/{{ $lesson_id }}/category/{{ $category_id }}/finish" method="post">
                            {{ csrf_field() }}
                            <div class="form-group w-50 mx-auto">
                                <input type="hidden" name="number" value="{{ $int }}">
                                    <input type="hidden" name="word_id" value="{{ $categories->words[$array_num]->id }}">
                                    <input type="hidden" name="word_answer" value="{{ $word_answer->id }}">
                                    <input type="hidden" name="word_count" value="{{ $categories->words->count() }}">
                                    <button type="submit" class="bg-light form-control mb-3">{{ $word_answer->text }}</button>
                            </div>
                        </form>
                    @endforeach
                @else
                    @foreach ($categories->words[$array_num]->word_answers as $word_answer)
                        <form action="/lesson/{{ $lesson_id }}/category/{{ $category_id }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group w-50 mx-auto">
                                <input type="hidden" name="number" value="{{ $int }}">
                                    <input type="hidden" name="word_id" value="{{ $categories->words[$array_num]->id }}">
                                    <input type="hidden" name="word_answer" value="{{ $word_answer->id }}">
                                    <input type="hidden" name="word_count" value="{{ $categories->words->count() }}">
                                    <button type="submit" class="bg-light form-control mb-3">{{ $word_answer->text }}</button>
                            </div>
                        </form>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection