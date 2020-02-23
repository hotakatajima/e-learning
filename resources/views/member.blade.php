@extends('layouts.master')

@section('content')

<div class="container text-center">
    @foreach($all as $user)
        @if($user->id == Auth::user()->id)
        <div class="card d-inline-block m-3" style="width:40%;">
            <div class="card-header p-4">
                <a class="font-weight-bold">{{ $user->name }}</a>
            </div>
        </div>
        @else
        <div class="card d-inline-block m-3" style="width:40%;">
            <div class="card-header p-4">
                <a href="/member/{{ $user->id }}" class="font-weight-bold"">{{ $user->name }}</a>
            </div>
        </div>
        @endif
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $all->links() }}
    </div>
</div>

@endsection