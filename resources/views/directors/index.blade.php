@extends('templates.base')
@section('title', 'Directors')
@section('content')
    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-0 py-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div>
                        <h1 class="h3 mb-0">Directors</h1>
                        <div class="text-muted small">Directors List (create, update, delete)</div>
                    </div>
                    <a href="{{ route('directors.create') }}" class="btn btn-primary">
                        Add New Director
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Place of Birth</th>
                                <th>Nationality</th>
                                <th>Year of Birth</th>
                                <th class="text-end pe-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($directors as $director)
                                <tr>
                                    <td class="ps-3 fw-semibold">{{ $director->idDirector }}</td>
                                    <td>{{ $director->name_director }}</td>
                                    <td>
                                        <span class="badge text-bg-secondary">
                                            {{ $director->gender_director ?? '—' }}
                                        </span>
                                    </td>
                                    <td>{{ $director->place_birth_director ?? '—' }}</td>
                                    <td>{{ $director->country_director ?? '—' }}</td>
                                    <td>{{ $director->year_birth_director ?? '—' }}</td>
                                    <td class="text-end pe-3">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('directors.edit', $director->idDirector) }}" class="btn btn-sm btn-outline-warning">
                                                Update
                                            </a>
                                            <form method="POST" action="{{ route('directors.destroy', $director->idDirector) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Delete this director?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">
                                        No directors found. Click <strong>Add New Director</strong> to add one.
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
