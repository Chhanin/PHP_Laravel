@extends('templates.base')
@section('title', 'Edit Director')
@section('content')
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div>
                        <h1 class="h3 mb-0">Edit Director</h1>
                        <div class="text-muted small">Update director details</div>
                    </div>
                    <a href="{{ route('directors.index') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
            <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('directors.update', $director->idDirector) }}">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">ID (read-only)</label>
                    <input type="text" class="form-control" value="{{ $director->idDirector }}" disabled>
                </div>

                <div class="col-md-9">
                    <label class="form-label">Name</label>
                    <input type="text" name="name_director" class="form-control" value="{{ old('name_director', $director->name_director) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Gender</label>
                    <input type="text" name="gender_director" class="form-control" value="{{ old('gender_director', $director->gender_director) }}">
                </div>

                <div class="col-md-8">
                    <label class="form-label">Place of Birth</label>
                    <input type="text" name="place_birth_director" class="form-control" value="{{ old('place_birth_director', $director->place_birth_director) }}">
                </div>

                <div class="col-md-8">
                    <label class="form-label">Nationality</label>
                    <input type="text" name="country_director" class="form-control" value="{{ old('country_director', $director->country_director) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Year of Birth</label>
                    <input type="number" name="year_birth_director" class="form-control" value="{{ old('year_birth_director', $director->year_birth_director) }}">
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('directors.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
            </div>
        </div>
    </div>
@endsection


