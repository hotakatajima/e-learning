@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="mt-5 mb-5 w-100 text-center">{{ $user->name }}'s Followings</h2>

            <div class="col-md-8 text-center">
                @foreach ($following as $foll)
                    <div class="card d-inline-block m-3" style="width:40%;">
                        <div class="card-header p-4">
                            <a href="/member/{{ $foll->id }}" class="font-weight-bold"">{{ $foll->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>       
    </div>
@endsection