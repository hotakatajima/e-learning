@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 mt-3">
                <div class="card">
                    <div class="card-header">
                        User Information
                    </div>
                    <div class="card-body mx-auto">
                        @if(Auth::user()->image)
                            <img src="{{ Auth::user()->image }}" alt="" width="150" height="150"  class="rounded-circle mb-3">
                        @else
                            <img src="/avatars/black.png" alt="" width="150" height="150"  class="rounded-circle mb-3">
                        @endif
                        <p class="font-weight-bold  text-center hotaka">{{ Auth::user()->name }}</p>
                        <p class="text-center">{{ Auth::user()->email }}</p>
                        <div class="text-center">
                            <a href="/useredit/{{ Auth::user()->id }}" class="btn btn-warning d-inline-block">Edit profile</a>
                        </div>  
                    </div>
                </div>
                <div class="card mt-5 mb-5">
                    <div class="card-header">
                        User Status
                    </div>
                    <div class="card-body text-center">
                        <a href="/learned/{{ Auth::user()->id }}" class="mb-3 d-inline-block text-secondary">learned {{ Auth::user()->lesson_words->count() }} words</a><br>
                        <a href="/learned/lesson/{{ Auth::user()->id }}" class="mb-3 d-inline-block text-secondary">learned {{ Auth::user()->lessons->count() }} lessons</a>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/followers/{{ Auth::user()->id }}" class="btn btn-outline-secondary mr-3"><span class="mr-3">{{ Auth::user()->followers->count() }}</span>Followers</a>
                            <a href="/following/{{ Auth::user()->id }}" class="btn btn-outline-secondary ml-3"><span class="mr-3">{{ Auth::user()->following->count() }}</span>Following</a>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-3">
                <div class="card">
                    <div class="card-header">
                        Activity Feeds
                    </div>
                    <div class="card-body">
                        @foreach ($activities as $activity)
                            @if($activity->activityable->category_id != null)
                                <a href="/member/{{ $activity->user->id }}">{{ $activity->user->name }}</a> learned <a href="/lesson/{{ $activity->activityable->id }}/finish/{{ $activity->activityable->category->words->count() }}">{{ $activity->activityable->category->title }}</a><br>
                                {{ $activity->activityable->created_at->diffForHumans() }}<br>
                                <br>
                            @elseif($activity->activityable->name != null)
                                <a href="/member/{{ $activity->user->id }}">{{ $activity->user->name }}</a> followed <a href="/member/{{ $activity->activityable->id }}">{{ $activity->activityable->name }}</a><br>
                                {{ $activity->created_at->diffForHumans() }}<br>
                                <br>
                            @endif
                        @endforeach
                        <div class="d-flex justify-content-center">
                            {{ $activities->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection