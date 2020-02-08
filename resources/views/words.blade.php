@extends('layouts.master')

@section('content')

    <div class="container">
        <a href="/category/{{ $num }}/create/words" class="float-right mb-2">+create new words</a>
        <table class="table-striped table-bordered w-100 mx-auto text-center mt-5">
            <tr>
                <th>Words</th>
                <th>Answers</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach( $words as $word )
            <tr>
                <td class="p-3">{{ $word->text }}</td>
                <td class="p-3">{{ $word->answer()->text }}</td>
                <td class="p-3">
                    <a href="/category/{{$word->category->id}}/edit/{{$word->id}}" class="form-control float-right bg-dark text-light text-center mx-auto">Edit</a>
                </td>
                <td class="p-3">
                    <form action="/category/{{$word->category->id}}/delete/{{$word->id}}" method="post">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button type="submit" class="form-control float-right bg-dark text-light text-center mx-auto">Delete</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection