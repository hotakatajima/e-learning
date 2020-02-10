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
                        <p class="font-weight-bold">{{ $show_one->name }}</p>

                        @if(Auth::user()->id != $show_one->id)
                            @if(Auth::user()->is_following($show_one->id))
                            <form action="/unfollow" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="follower_id" value="{{ $show_one->id }}">
                                <button type="submit" class="form-control w-50 mx-auto bg-danger text-light">Unfollow</button>
                            </form>
                            @else
                            <form action="/follow" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="follower_id" value="{{ $show_one->id }}">
                                <button type="submit" class="form-control w-50 mx-auto bg-primary text-light">follow</button>
                            </form>
                            @endif
                        @endif

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
                            <a href="/followers/{{ $show_one->id }}" class="btn btn-outline-secondary mr-3"><span class="mr-3">{{ $show_one->followers->count() }}</span>Followers</a>
                            <a href="/following/{{ $show_one->id }}" class="btn btn-outline-secondary ml-3"><span class="mr-3">{{ $show_one->following->count() }}</span>Following</a>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-3">
                @if(Auth::user()->id != $show_one->id)
                    @if(Auth::user()->is_following($show_one->id))
                    <div class="card">
                        <div class="card-header">
                            Activity Feeds
                        </div>
                        <div class="card-body">
                            @foreach ($show_one->activities as $activity)
                                @if($activity->activityable->category_id != null)
                                    <a href="/member/{{ $show_one->id }}">{{ $show_one->name }}</a> learned <a href="/lesson/{{ $activity->activityable->id }}/finish/{{ $activity->activityable->category->words->count() }}">{{ $activity->activityable->category->title }}</a><br>
                                    {{ $activity->activityable->created_at->diffForHumans() }}<br>
                                    <br>
                                @elseif($activity->activityable->name != null)
                                    <a href="/member/{{ $show_one->id }}">{{ $show_one->name }}</a> followed <a href="/member/{{ $activity->activityable->id }}">{{ $activity->activityable->name }}</a><br>
                                    {{ $activity->activityable->created_at->diffForHumans() }}<br>
                                    <br>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @else
                    <div class="card">
                        <div class="card-header">
                            You don't follow this user.
                        </div>
                    </div>
                    @endif
                @else
                    <div class="card">
                        <div class="card-header">
                            Activity Feeds
                        </div>
                        <div class="card-body">
                            @foreach ($show_one->activities as $activity)
                                @if($activity->activityable->category_id != null)
                                    <a href="/member/{{ $show_one->id }}">{{ $show_one->name }}</a> learned <a href="/lesson/{{ $activity->activityable->id }}/finish/{{ $activity->activityable->category->words->count() }}">{{ $activity->activityable->category->title }}</a><br>
                                    {{ $activity->activityable->created_at->diffForHumans() }}<br>
                                    <br>
                                @elseif($activity->activityable->name != null)
                                    <a href="/member/{{ $show_one->id }}">{{ $show_one->name }}</a> followed <a href="/member/{{ $activity->activityable->id }}">{{ $activity->activityable->name }}</a><br>
                                    {{ $activity->activityable->created_at->diffForHumans() }}<br>
                                    <br>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection