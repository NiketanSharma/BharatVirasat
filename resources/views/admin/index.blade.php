@extends('layouts.app')

@section('title', __('ui.admin_title') . ' — ' . __('ui.app_name'))

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="section-title">
            <i class="bi bi-gear me-2"></i>{{ __('ui.admin_title') }}
        </h1>
    </div>

    {{-- Edit Form (shown when editing) --}}
    @isset($item)
    <div class="card border-0 shadow-sm mb-5" style="border-radius: 20px; border-left: 4px solid var(--gold) !important;">
        <div class="card-body p-4">
            <h4 class="mb-3" style="color: var(--deep-red);">
                <i class="bi bi-pencil-square me-2"></i>{{ __('ui.admin_edit') }}: {{ $item->name }}
            </h4>
            
            @if ($errors->any())
                <div class="alert alert-danger" style="border-radius: 12px;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">{{ __('ui.form_name') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $item->name) }}" required style="border-radius: 10px;">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">{{ __('ui.form_category') }}</label>
                        <select name="category" class="form-select" required style="border-radius: 10px;">
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ $item->category == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">{{ __('ui.form_state') }}</label>
                        <input type="text" name="state" class="form-control" value="{{ old('state', $item->state) }}" required style="border-radius: 10px;">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">{{ __('ui.form_short_desc') }}</label>
                        <textarea name="short_desc" class="form-control" rows="2" required style="border-radius: 10px;">{{ old('short_desc', $item->short_desc) }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">{{ __('ui.form_long_desc') }}</label>
                        <textarea name="long_desc" class="form-control" rows="5" required style="border-radius: 10px;">{{ old('long_desc', $item->long_desc) }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">{{ __('ui.form_image') }}</label>
                        <input type="file" name="image" class="form-control" accept="image/*" style="border-radius: 10px;">
                    </div>
                    <div class="col-md-6 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-saffron">
                            <i class="bi bi-check-lg me-1"></i>{{ __('ui.admin_update') }}
                        </button>
                        <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary">
                            {{ __('ui.admin_cancel') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endisset

    {{-- Pending Submissions --}}
    <div class="card border-0 shadow-sm mb-5" style="border-radius: 20px;">
        <div class="card-header bg-transparent border-0 p-4 pb-0">
            <h4 style="color: var(--deep-red);">
                <i class="bi bi-hourglass-split me-2" style="color: var(--saffron);"></i>
                {{ __('ui.admin_pending') }}
                <span class="badge bg-warning text-dark ms-2">{{ $pending->count() }}</span>
            </h4>
        </div>
        <div class="card-body p-4">
            @if($pending->count() > 0)
                <div class="table-responsive">
                    <table class="table table-heritage table-hover align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('ui.admin_name') }}</th>
                                <th>{{ __('ui.admin_category') }}</th>
                                <th>{{ __('ui.admin_state') }}</th>
                                <th>{{ __('ui.admin_submitted') }}</th>
                                <th>{{ __('ui.admin_actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pending as $p)
                                <tr>
                                    <td class="fw-semibold">{{ $p->name }}</td>
                                    <td><span class="badge badge-category">{{ ucfirst($p->category) }}</span></td>
                                    <td><span class="badge badge-state">{{ $p->state }}</span></td>
                                    <td class="text-muted" style="font-size: 0.85rem;">{{ $p->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('admin.approve', $p->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm" style="border-radius: 8px;">
                                                    <i class="bi bi-check-lg me-1"></i>{{ __('ui.admin_approve') }}
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.destroy', $p->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" style="border-radius: 8px;">
                                                    <i class="bi bi-trash me-1"></i>{{ __('ui.admin_delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-check-circle" style="font-size: 2rem; color: var(--gold);"></i>
                    <p class="mt-2">{{ __('ui.admin_no_pending') }}</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Approved Items --}}
    <div class="card border-0 shadow-sm" style="border-radius: 20px;">
        <div class="card-header bg-transparent border-0 p-4 pb-0">
            <h4 style="color: var(--deep-red);">
                <i class="bi bi-patch-check-fill me-2" style="color: var(--gold);"></i>
                {{ __('ui.admin_approved') }}
                <span class="badge" style="background: var(--gold); color: var(--dark-brown);">{{ $approved->count() }}</span>
            </h4>
        </div>
        <div class="card-body p-4">
            @if($approved->count() > 0)
                <div class="table-responsive">
                    <table class="table table-heritage table-hover align-middle">
                        <thead>
                            <tr>
                                <th>{{ __('ui.admin_name') }}</th>
                                <th>{{ __('ui.admin_category') }}</th>
                                <th>{{ __('ui.admin_state') }}</th>
                                <th>{{ __('ui.admin_actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($approved as $a)
                                <tr>
                                    <td class="fw-semibold">
                                        <a href="{{ route('heritage.show', $a->id) }}" class="text-decoration-none" style="color: var(--deep-red);">
                                            {{ $a->name }}
                                        </a>
                                    </td>
                                    <td><span class="badge badge-category">{{ ucfirst($a->category) }}</span></td>
                                    <td><span class="badge badge-state">{{ $a->state }}</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.edit', $a->id) }}" class="btn btn-gold btn-sm" style="border-radius: 8px;">
                                                <i class="bi bi-pencil me-1"></i>{{ __('ui.admin_edit') }}
                                            </a>
                                            <form action="{{ route('admin.destroy', $a->id) }}" method="POST"
                                                  onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" style="border-radius: 8px;">
                                                    <i class="bi bi-trash me-1"></i>{{ __('ui.admin_delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-4 text-muted">
                    <i class="bi bi-collection" style="font-size: 2rem; color: var(--gold);"></i>
                    <p class="mt-2">{{ __('ui.admin_no_approved') }}</p>
                </div>
            @endif
        </div>
    </div>
    {{-- Trivia Management --}}
    <div class="card border-0 shadow-sm mt-5" style="border-radius: 20px;">
        <div class="card-header bg-transparent border-0 p-4 pb-0 d-flex justify-content-between align-items-center">
            <h4 style="color: var(--deep-red);">
                <i class="bi bi-question-circle-fill me-2" style="color: var(--saffron);"></i>
                {{ __('ui.admin_trivia') }}
                <span class="badge" style="background: var(--dark-brown); color: var(--gold);">{{ $trivia->count() }}</span>
            </h4>
            <button class="btn btn-sm btn-saffron" type="button" data-bs-toggle="collapse" data-bs-target="#addTriviaForm">
                <i class="bi bi-plus-lg me-1"></i>{{ __('ui.admin_add_trivia') }}
            </button>
        </div>
        <div class="card-body p-4">
            
            {{-- Add Trivia Form (Collapsible) --}}
            <div class="collapse mb-4" id="addTriviaForm">
                <div class="card card-body bg-light" style="border-radius: 15px; border-left: 4px solid var(--saffron) !important;">
                    <form action="{{ route('admin.trivia.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Question</label>
                            <input type="text" name="question" class="form-control" required>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Option A</label>
                                <input type="text" name="option_a" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Option B</label>
                                <input type="text" name="option_b" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Option C</label>
                                <input type="text" name="option_c" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Option D</label>
                                <input type="text" name="option_d" class="form-control" required>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Correct Option</label>
                                <select name="correct_option" class="form-select" required>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-bold">Explanation (Optional)</label>
                                <input type="text" name="explanation" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i>Save Question</button>
                    </form>
                </div>
            </div>

            {{-- List Trivia --}}
            @if($trivia->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Question</th>
                                <th>Correct Ans</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trivia as $t)
                                <tr>
                                    <td class="fw-semibold">{{ $t->question }}</td>
                                    <td><span class="badge bg-success">{{ strtoupper($t->correct_option) }}</span></td>
                                    <td>
                                        <form action="{{ route('admin.trivia.destroy', $t->id) }}" method="POST"
                                              onsubmit="return confirm('Delete this question?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" style="border-radius: 8px;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted text-center py-3">No trivia questions added yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
