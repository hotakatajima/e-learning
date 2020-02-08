@extends('layouts.master')

@section('content')

    <div class="container w-50">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-6">
                    <div class="card mb-3">
                        <div class="card-header w-100">
                            <form action="/category/{{ $category->id }}/lesson_word" method="post">
                                {{ csrf_field() }}
                                <p class="display-4">{{ $category->title }}</p>
                                <p class="display-5">{{ $category->description }}</p>
                                <button type="submit" class="btn btn-warning float-right">Start</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection