@extends('layouts.main')

@section('title', 'Notes App | All Notes')

@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Notes</h2>
                                <div class="ml-auto">
                                    <a href="{{ route('notes.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('notes._filter')
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Content</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @include('layouts._message')
                                    @if ($notes->count())
                                        @foreach($notes as $index => $note)
                                            <tr>
                                                <th scope="row">{{ $note->id }}</th>
                                                <td>{{ $note->name }}</td>
                                                <td>{{ $note->content }}</td>
                                                <td width="150">
                                                    <div style="display:flex; justify-content: space-between">
                                                    <div>
                                                    <a href="{{ route('notes.show', $note->id)}}" class="btn btn-sm btn-circle btn-outline-info"
                                                       title="Show"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                    <div>
                                                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-circle btn-outline-secondary"
                                                       title="Edit"><i class="fa fa-edit"></i></a>
                                                    </div>
                                                    <div>
{{--                                                    <a href="{{ route('notes.destroy', $note->id) }}" class="btn-delete btn btn-sm btn-circle btn-outline-danger"--}}
{{--                                                       title="Delete" ><i class="fa fa-times"></i></a>--}}
                                                    <form action="{{ url('/notes', ['id' => $note->id]) }}" method="post">
                                                        <input class="btn btn-sm btn-circle btn-outline-danger " type="submit" value="☓" />
                                                        <input type="hidden" name="_method" value="delete" />
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                    </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                        @include('layouts._delete-form')
                                    @endif
                                </tbody>
                            </table>
{{--                            {{ $notes->appends(request()->links()) }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
