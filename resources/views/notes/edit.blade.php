@extends('layouts.main')

@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Edit Note</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('notes.update', $note->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @include('notes._form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('title', 'Notes App | Add new note')
