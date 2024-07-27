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
                    <h4 class="fs-18 fw-semibold m-0">Quản lý đơn hàng</h4>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between ">
                        <h5 class="card-title mb-0 align-content-center">{{ $title }}</h5>

                        {{-- <a href="{{ route('admins.sanphams.create') }}" class="btn btn-success "><i
                                data-feather="plus-square"></i>Thêm sản phẩm</a> --}}
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
                            <form action="" method="post">
                                @csrf
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="ma_don_hang" class="form-label">Mã đơn hàng</label>
                                                <input type="text" id="ma_don_hang" name="ma_don_hang"
                                                   value="{{$Donhang->ma_don_hang}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="ten_nguoi_nhan" class="form-label">Tên người nhận</label>
                                                <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan"
                                                value="{{$Donhang->ten_nguoi_nhan}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email_nguoi_nhan" class="form-label">Emai người nhận</label>
                                                <input type="text" id="email_nguoi_nhan" name="email_nguoi_nhan"
                                                value="{{$Donhang->email_nguoi_nhan}}"  class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="sdt_nguoi_nhan" class="form-label">SĐT</label>
                                                <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan"
                                                value="{{$Donhang->sdt_nguoi_nhan}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Giới tính</label>
                                               <select name="gioi_tinh" id="" class="form-control">
                                                <option value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                               </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                    
                                            <div class="mb-3">
                                                <label for="dia_chi_nguoi_nhan" class="form-label">Địa chỉ</label>
                                                <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan"
                                                value="{{$Donhang->dia_chi_nguoi_nhan}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="user_id" class="form-label">Tên tài khoản</label>
                                                <input type="text" id="user_id" name="user_id"
                                                value="{{$Donhang->ma_don_hang}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="trang_thai_don_hang_id" class="form-label">Trạng thái</label>
                                                <input type="text" id="trang_thai_don_hang_id" name="trang_thai_don_hang_id"
                                                value="{{$Donhang->trang_thai_don_hang_id}}"class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="ngay_dat" class="form-label">Ngày đặt</label>
                                                <input type="text" id="ngay_dat" name="ngay_dat"
                                                value="{{$Donhang->ngay_dat}}" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label for="tong_tien" class="form-label">Tổng tiền</label>
                                                <input type="text" id="tong_tien" name="tong_tien"
                                                value="{{$Donhang->tong_tien}}"  class="form-control">
                                            </div>
                                        </div>

                                        
                                        <div class="text-center">
                                            <a href="{{route('admins.donhangs.index')}}"><button class="btn btn-info">Quay lại</button></a>
                                        </div>
                                </form>
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
