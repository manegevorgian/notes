@extends('layouts.main')

@section('title', 'Notes App | Show Note')

@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Note Details</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-3 col-form-label">Name</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext text-muted">{{ $note->name }}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="last_name" class="col-md-3 col-form-label">Content</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext text-muted">{{ $note->content }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-3">
                                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('notes.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                        </div>
                                        @include('layouts._delete-form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
