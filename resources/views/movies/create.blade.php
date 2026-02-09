@extends('templates.base')
@section('title', 'Create Movie')
@section('content')
    <div class="container">
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div>
                        <h1 class="h3 mb-0">Create Movie</h1>
                        <div class="text-muted small">Add a new movie and link it to a director and studio</div>
                    </div>
                    <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Back</a>
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

                <form method="POST" action="{{ route('movies.store') }}">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" name="name_movie" class="form-control" value="{{ old('name_movie') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Director</label>
                            <select name="Director_idDirector" class="form-select" required>
                                <option value="">-- Select Director --</option>
                                @foreach ($directors as $director)
                                    <option value="{{ $director->idDirector }}" @selected(old('Director_idDirector') == $director->idDirector)>
                                        {{ $director->idDirector }} - {{ $director->name_director }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Studio</label>
                            <select name="Studio_idStudio" class="form-select" required>
                                <option value="">-- Select Studio --</option>
                                @foreach ($studios as $studio)
                                    <option value="{{ $studio->idStudio }}" @selected(old('Studio_idStudio') == $studio->idStudio)>
                                        {{ $studio->idStudio }} - {{ $studio->company_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Country of Release</label>
                            <input type="text" name="country_of_release" class="form-control" value="{{ old('country_of_release') }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Year of Release</label>
                            <input type="number" name="year_of_release" class="form-control" value="{{ old('year_of_release') }}" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Language</label>
                            <input type="text" name="language" class="form-control" value="{{ old('language') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Filming Location</label>
                            <input type="text" name="filming_location" class="form-control" value="{{ old('filming_location') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" value="{{ old('category') }}" required>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


