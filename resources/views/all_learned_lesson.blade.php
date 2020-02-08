@extends('layouts.master')

@section('content')

    <div class="container">
        <table class="table-striped table-bordered w-100 mx-auto text-center mt-5">
            <tr>
                <th>Lesson</th>
                <th>Category</th>
                <th>Time</th>
            </tr>
    
            @foreach( $all_results as $key => $all_result ) 
                <tr>
                    <td class="p-3">
                        {{ $key + 1 }}
                    </td>
                    <td class="p-3">
                        {{ $all_result->category->title }}
                    </td>
                    <td class="p-3">
                        {{ $all_result->created_at->diffForHumans() }}
                    </td>
                </tr>
            @endforeach    
        </table>
    </div>

@endsection