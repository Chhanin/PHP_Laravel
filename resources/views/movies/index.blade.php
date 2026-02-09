@extends('templates.base')
@section('title', 'Movies')
@section('content')
    <div class="container">
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div>
                        <h1 class="h3 mb-0">Movies</h1>
                        <div class="text-muted small">List of all movies</div>
                    </div>
                    <a href="{{ route('movies.create') }}" class="btn btn-primary">
                        Create New Movie
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">ID</th>
                                <th>Title</th>
                                <th>Director ID</th>
                                <th>Studio ID</th>
                                <th>Country</th>
                                <th>Year</th>
                                <th>Language</th>
                                <th>Location</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($movies as $movie)
                                <tr>
                                    <td class="ps-3 fw-semibold">{{ $movie->idMovie }}</td>
                                    <td>{{ $movie->name_movie }}</td>
                                    <td>{{ $movie->Director_idDirector }}</td>
                                    <td>{{ $movie->Studio_idStudio }}</td>
                                    <td>{{ $movie->country_of_release }}</td>
                                    <td>{{ $movie->year_of_release }}</td>
                                    <td>{{ $movie->language }}</td>
                                    <td>{{ $movie->filming_location }}</td>
                                    <td>{{ $movie->category }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-5">
                                        No movies found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

