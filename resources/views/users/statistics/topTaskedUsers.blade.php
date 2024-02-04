@extends('layouts.master')

@section('title', 'User Stats')


@section('content')

<div class="page-wrapper">

    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        User Statistics </span>
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
                        <h3 class="card-title">Top 10 Tasked Users</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable" id="users-table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Tasks Count</th>
                                    <th>Last Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statistics->resolve() as $stat)
                                <tr>
                                    <td>
                                        {{ $stat['user_name'] }}
                                    </td>
                                    <td>
                                        {{ $stat['tasks_count'] }}
                                    </td>
                                    <td>
                                        {{ $stat['updated_at'] }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

</div>


@endsection
