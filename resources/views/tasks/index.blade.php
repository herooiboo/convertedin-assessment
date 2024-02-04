@extends('layouts.master')

@section('title', 'List Tasks')


@section('content')

<div class="page-wrapper">

    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        List Tasks <span class="pt-4 ps-1 text-muted h4">{{ Request::get('search') ? 'Searching :
                            "'.Request::get('search').'"':'' }} </span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tasks List</h3>
                    </div>
                    <div class="card-body  border-bottom py-3 d-flex justify-content-between row">
                        <div class="d-flex col-auto  mb-2">
                            <div class="text-muted">
                                Show
                                <div class="mx-2 d-inline-block">

                                    {{ Form::open(['route' => ['tasks.index'], 'method' => 'get', 'id' =>
                                    'entry']) }}
                                    @foreach (Arr::except(request()->query(), ['limit']) as $key => $get)
                                    {{ Form::hidden($key, $get, ['type' => 'hidden']) }}
                                    @endforeach
                                    {{ Form::select(
                                    'limit',
                                    [
                                    '10' => '10',
                                    '25' => '25',
                                    '50' => '50',
                                    '100' => '100',
                                    '500' => '500',
                                    '10000' => 'All',
                                    ],
                                    request('limit') ? request('limit') : '8',
                                    ['class' => 'form-select', 'onchange' =>
                                    'document.getElementById("entry").submit();'],
                                    ) }}
                                    {{ Form::close() }}
                                </div>
                                Per Page
                            </div>

                        </div>
                        <div class="d-flex col-auto">
                            <form action="" class="d-inline-block w-9 h-4 me-3" method="GET">
                                @if(Request::get('limit'))
                                {{ Form::hidden('limit',Request::get('limit'), ['type' => 'hidden']) }}
                                @endif

                                <input type="search" name="search" class="form-control "
                                    value="{{ Request::get('search') }}" placeholder="Search...">
                            </form>
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary h-4 py-3">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Create New Task
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable" id="users-table">
                            <thead>
                                <tr>
                                    <th class="w-1"> ID
                                    </th>
                                    <th>Task Title</th>
                                    <th>Assigned By</th>
                                    <th>Assigned To</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tasks->resolve() as $task)
                                <tr>
                                    <td>
                                        {{ $task['id'] }}
                                    </td>

                                    <td>
                                        {{ $task['title'] }}
                                    </td>
                                    <td>
                                        {{ $task['assigned_by'] }}
                                    </td>
                                    <td>
                                        {{ $task['assigned_to'] }}
                                    </td>
                                    <td>
                                        {{ $task['created_at'] }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </form>
                    <div class="card-footer d-flex align-items-center">
                        {{ $tasks->appends(Arr::except(request()->query(),
                        ['page']))->links('vendor.pagination.tablerPaginating') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
