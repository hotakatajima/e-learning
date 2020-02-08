@extends('layouts.master')

@section('content')

    <div class="container">
        <table class="table-striped table-bordered w-100 mx-auto text-center mt-5">
            <tr>
                <th>Lesson</th>
                <th>Word</th>
                <th>Your Answer</th>
                <th>Correct Answer</th>
            </tr>
    
            @foreach( $all_results as $key => $all_result ) 
                <tr>
                    <td class="p-3">
                        {{ $key + 1 }}
                    </td>
                    <td class="p-3">
                        @foreach ( $all_result->lesson_words  as $lesson_word )
                              {{  $lesson_word->word->text }}<br>
                        @endforeach
                    </td>
                    <td class="p-3">
                        @foreach ( $all_result->lesson_words  as $your_answer )
                              {{  $your_answer->word->answer()->text }}<br>
                        @endforeach
                    </td>
                    <td class="p-3">
                        @foreach ( $all_result->lesson_words  as $lesson_answer )
                              {{  $lesson_answer->word_answers->text }}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach    
        </table>
    </div>

@endsection