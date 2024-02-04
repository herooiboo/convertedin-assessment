@extends('layouts.master')

@section('title', 'Create New Task')

@push('scripts')
<script src="{{ asset('dist/libs/tom-select/dist/js/tom-select.base.min.js') }}"></script>
<script src="{{ asset('custom/tom-select-search.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_TOKEN') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin">
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
            initializeTomSelect('/search/users', '#assigned_to_id');
            initializeTomSelect('/search/admins', '#assigned_by_id');
        });
</script>
<script src="{{ asset('custom/tinymce-setup.js') }}" referrerpolicy="origin">
</script>
@endpush

@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Create New Task
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <!-- Task creation form -->
        <form class="card" method="post" action="{{ route('tasks.store') }}">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Task Information</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">Title</label>
                    <div>
                        <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                            placeholder="Enter task title" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <div>
                        <textarea class="form-control" name="description"
                            placeholder="Enter task description"> {{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Admin Name</label>
                    <div>
                        <select class="form-control" id="assigned_by_id" name="assigned_by_id" required></select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Assigned User</label>
                    <div>
                        <select class="form-control" id="assigned_to_id" name="assigned_to_id" required></select>
                    </div>
                </div>

            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
