@extends('layouts.admin')


@section('title')
    {{ $title }}
@endsection

@section('css')
@endsection
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Quản lý tài khoản</h4>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between ">
                        <h5 class="card-title mb-0 align-content-center">{{ $title }}</h5>

                        <a href="{{ route('admins.taikhoans.create') }}" class="btn btn-success "><i
                                data-feather="plus-square"></i>Thêm tài khoản</a>
                    </div><!-- end card header -->

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên tài khoản</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listTK as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <th scope="row">{{ $item->name }}</th>
                                            <th scope="row">{{ $item->email }}</th>
                                            <th scope="row">{{ $item->password }}</th>
                                            <th scope="row">{{ $item->role }}</th>
                                            <td>
                                                <a href="{{ route('admins.taikhoans.edit', $item->id) }}"><i
                                                        class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>

                                                <form action="{{ route('admins.taikhoans.destroy', $item->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-white">
                                                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"
                                                            onclick="return(confirm('Bạn có muốn xóa không ??'))"></i>

                                                    </button>

                                                </form>
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

@section('js')
@endsection
