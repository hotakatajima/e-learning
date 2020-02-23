@extends('layouts.master')

@section('content')

    <div class="container w-50">
        <div class="row">
            <div class="col-12">
                <div class="btn-group m-3 float-right" role="group" aria-label="Basic example">
                    <a href="/user/category/1" type="button" class="btn btn-warning">All</a>
                    <a href="/user/category/2" type="button" class="btn btn-warning">Learned</a>
                    <a href="/user/category/3" type="button" class="btn btn-warning">Not yet</a>
                </div>          
            </div>
        </div>
        @if ($number == 1)
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
        @elseif ($number == 2)
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-header w-100">
                                <form action="/category/{{ $category->first()->category->id }}/lesson_word" method="post">
                                    {{ csrf_field() }}
                                    <p class="display-4">{{ $category->first()->category->title }}</p>
                                    <p class="display-5">{{ $category->first()->category->description }}</p>
                                    <button type="submit" class="btn btn-warning float-right">Start</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else 
            
        @endif
    </div>

@endsection