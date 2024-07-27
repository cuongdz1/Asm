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
                    <h4 class="fs-18 fw-semibold m-0">{{ $title }}</h4>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admins.taikhoans.update', $taikhoan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên tài khoản</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control
                                        @error('name') is-invalid @enderror"
                                            value="{{$taikhoan->name}}" placeholder="Tên danh mục">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control 
                                        @error('email') is-invalid @enderror"
                                        value="{{$taikhoan->email}}" placeholder="Tên danh mục"  value="{{$taikhoan->email}}">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" id="password" name="password"
                                            class="form-control 
                                        @error('password') is-invalid @enderror"
                                        value="{{$taikhoan->password}}" placeholder="Tên danh mục"  value="{{$taikhoan->password}}">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" id="" class="form-control">
                                            <option value="" selected>-- Chọn --</option>
                                            <option value="1">Admin</option>
                                            <option value="0">User</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning">Sửa tài khoản</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('js')

@endsection
