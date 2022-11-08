@extends('admin-panel.master')

@section('content')
    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('settings') }}" class="text-success btn-lg"><i class="fa fa-cog">Settings</i></a>
                            <h3 class="mx-auto w-100 text-white mt-2">Product Categories List</h3>
                            {{-- <i class="fa fa-question-circle ml-auto"></i> --}}
                            <a href="{{ route('home') }}" class="text-success btn-lg"><i
                                    class="fa fa-home">Dashboard</i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- @dd($data); --}}
                        @if (isset($data))
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Avatar</th>
                                        <th>Phone</th>
                                        <th>User Type</th>
                                        <th>Joining date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @if ($data->count() > 0)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/admins/' . $item->avatar) }}" alt=""
                                                        width="50">
                                                </td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->is_admin }}</td>
                                                <td>
                                                    @php
                                                        $month = date('d/m/Y', strtotime($item->created_at));
                                                        // dd($month);
                                                        echo $month;
                                                    @endphp
                                                </td>

                                                <td>
                                                    @if ($item->status == 'inactive')
                                                        <button type="button" class="btn btn-danger  btn-sm">
                                                            {{ $item->status }} </button>
                                                    @else
                                                        <button type="button" class="btn btn-success btn-sm">
                                                            {{ $item->status }} </button>
                                                    @endif
                                                </td>
                                                </td>

                                                <td style="width: 100px">
                                                    <a href="{{ url('edit-admin/' . $item->id) }}"
                                                        class="btn btn-outline-warning btn-sm edit" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    |
                                                    <a href="{{ url('delete-admin/' . $item->id) }}"
                                                        class="btn btn-outline-danger btn-sm delete" title="Delete"
                                                        onclick="return confirm('Are you sure to delete Record?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td><code>No record found...</code></td>
                                        </tr>
                                    @endif



                                </tbody>
                            </table>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
