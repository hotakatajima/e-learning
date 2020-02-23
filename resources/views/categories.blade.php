@extends('layouts.master')

@section('content')

    <div class="container">
        <a href="/create" class="float-right mb-2">+create new category</a>
        <table class="table-striped table-bordered w-100 mx-auto text-center mt-5">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Words</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach( $categories as $category )
                <tr>
                    <td class="p-3"><a href="category/{{ $category->id }}/word">{{ $category->title }}</a></td>
                    <td class="p-3">{{ $category->description }}</td>
                    <td class="p-3">{{ $category->words->count() }}</td>
                    <td class="p-3">
                        <a href="/edit/{{ $category->id }}" class="form-control float-right bg-dark text-light text-center mx-auto">Edit</a>
                    </td>
                    <td class="p-3">
                        <form action="/delete/{{ $category->id }}" method="post">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button type="submit" class="form-control float-right bg-dark text-light text-center mx-auto">Delete</a>
                        </form>
                    </td>
                </tr>
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            @endforeach
        </table>
    </div>

@endsection