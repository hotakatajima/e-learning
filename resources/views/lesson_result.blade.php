@extends('layouts.master')

@section('content')

<div class="container">
    @php
       $int = 0; 
    @endphp
    
    <table class="table-striped table-bordered w-100 mx-auto text-center mt-5">
        <tr>
            <th>Word</th>
            <th>Your Answer</th>
            <th>Correct Answer</th>
            <th>Result</th>
        </tr>
        
        @foreach( $lesson_results as $lesson_result ) 
            <tr>
                <td class="p-3">{{ $lesson_result->word->text }}</td>
                <td class="p-3">{{ $lesson_result->word_answers->text }}</td>
                <td class="p-3">{{ $lesson_result->word->answer()->text }}</td>
                <td class="p-3">
                    @if ( $lesson_result->word_answers->text == $lesson_result->word->answer()->text )
                        <span class="text-success">○</span>
                        @php
                            $int += 1;
                        @endphp
                    @else
                        <span class="text-danger">×</span>
                    @endif    
                </td> 
            </tr>
        @endforeach

        <h3 class="float-right">{{ $int }}/{{ $word_count }}</h3>
        
    </table>
</div>

@endsection