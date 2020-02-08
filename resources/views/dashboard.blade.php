@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 mt-3">
                <div class="card">
                    <div class="card-header">
                        User Information
                    </div>
                    <div class="card-body text-center">
                        <p class="font-weight-bold">{{ Auth::user()->name }}</p>
                        <p>{{ Auth::user()->email }}</p>
                        <a href="/useredit/{{ Auth::user()->id }}" class="btn btn-warning">Edit profile</a>
                    </div>
                </div>
                <div class="card mt-5 mb-5">
                    <div class="card-header">
                        User Status
                    </div>
                    <div class="card-body text-center">
                        <a href="/learned" class="mb-3 d-inline-block text-secondary">learned {{ Auth::user()->lesson_words->count() }} words</a><br>
                        <a href="/learned/lesson" class="mb-3 d-inline-block text-secondary">learned {{ Auth::user()->lessons->count() }} lessons</a>
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
                        @php
                            $int = 0;
                        @endphp

                        @foreach (Auth::user()->activities as $activity)
                            @if($activity->activityable->category_id != null)
                                <a href="/member/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a> learned <a href="/lesson/{{ $activity->activityable->category->lessons[$int]->id }}/finish/{{ $activity->activityable->category->words->count() }}">{{ $activity->activityable->category->title }}</a><br>
                                {{ $activity->activityable->created_at->diffForHumans() }}<br>
                                <br>
                                @php
                                    $int += 1;
                                @endphp
                            @elseif($activity->activityable->name != null)
                                <a href="/member/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a> followed <a href="/member/{{ $activity->activityable->id }}">{{ $activity->activityable->name }}</a><br>
                                {{ $activity->activityable->created_at->diffForHumans() }}<br>
                                <br>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection