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
                    <h4 class="fs-18 fw-semibold m-0">Chi tiết sản phẩm</h4>
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
                        <div class="table-responsive">
                            <form action="{{ route('admins.sanphams.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
                                            <input type="text" id="ma_san_pham" name="ma_san_pham" class="form-control"
                                                value="{{ $sanpham->ma_san_pham }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                                            <input type="text" id="ten_san_pham" name="ten_san_pham"
                                                value="{{ $sanpham->ten_san_pham }}" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="gia" class="form-label">Giá sản phẩm</label>
                                            <input type="number" id="gia" name="gia" class="form-control"
                                                value="{{ $sanpham->gia }}">

                                        </div>

                                        <div class="mb-3">
                                            <label for="gia_khuyen_mai" class="form-label">Giá khuyến mãi</label>
                                            <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai"
                                                value="{{ $sanpham->gia_khuyen_mai }}" class="form-control">

                                        </div>

                                        <div class="mb-3">
                                            <label for="danh_muc_id" class="form-label">Danh mục</label>
                                            <input type="text" id="danh_muc_id" name="danh_muc_id"
                                                value="{{ $sanpham->danhMuc->ten_danh_muc }}" class="form-control">

                                        </div>

                                        <div class="mb-3">
                                            <label for="so_luong" class="form-label">Số lượng</label>
                                            <input type="number" id="so_luong" name="so_luong"
                                                value="{{ $sanpham->so_luong }}" class="form-control">

                                        </div>

                                        <div class="mb-3">
                                            <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                                            <input type="date" id="ngay_nhap"
                                                name="ngay_nhap"value="{{ $sanpham->ngay_nhap }}" class="form-control ">

                                        </div>

                                        <div class="mb-3">
                                            <label for="mo_ta_ngan" class="form-label">Mô tả ngắn</label>

                                            <input type="text" id="mo_ta_ngan"
                                                name="mo_ta_ngan"value="{{ $sanpham->mo_ta_ngan }}" class="form-control ">

                                        </div>
                                    </div>



                                    <div class="col-lg-8">

                                        <div class="mb-3">
                                            <label for="noi_dung" class="form-label">Mô tả chi tiết</label>

                                            <input type="text" id="noi_dung"
                                                name="noi_dung" value="{!!$sanpham->noi_dung!!}" class="form-control ">

                                        </div>

                                        <div class="mb-3">
                                            <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                        
                                            <img src="{{ Storage::url($sanpham->hinh_anh) }}" alt="Hình ảnh sản phẩm"
                                                id="img_DM" onchange="showImage(event)" style="width: 100px;">
                                        </div>

                                        <div class="mb-3">
                                            <label for="mo_ta_ngan" class="form-label">Bình luận của sản phẩm này</label>

                                            <input type="text" id="mo_ta_ngan"
                                                name="mo_ta_ngan"value="{{ $sanpham->mo_ta_ngan }}" class="form-control ">
                                        </div>

                                        <label for="hinh_anh" class="form-label">Tùy chỉnh khác</label>
                                    <div class="form-switch mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input bg-warning" type="checkbox" id="is_new"
                                                value="{{ $sanpham->is_new }}" name="is_new" checked>
                                            <label class="form-check-label" for="is_new">New</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input  bg-danger" type="checkbox" id="is_hot"
                                                value="{{ $sanpham->is_hot }}" name="is_hot" checked>
                                            <label class="form-check-label" for="is_hot">Hot</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input bg-pink" type="checkbox"
                                                id="is_hot_deal"value="{{ $sanpham->is_hot_deal }}" name="is_hot_deal"
                                                checked>
                                            <label class="form-check-label" for="is_hot_deal">Hot deal</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input bg-black" type="checkbox"
                                                id="is_show_home"value="{{ $sanpham->is_show_home }}" name="is_show_home"
                                                checked>
                                            <label class="form-check-label" for="is_show_home">Show home</label>
                                        </div>
                                    </div>


                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Trạng thái</legend>
                                        <div class="col-sm-10 d-flex gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trang_thai"
                                                    id="trang_thai" value="1"
                                                    {{ $sanpham->trang_thai == true ? 'checked' : '' }}>
                                                <label class="form-check-label text-info" for="gridRadios1">
                                                    Hiển thị
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="trang_thai"
                                                    id="trang_thai" value="0"
                                                    {{ $sanpham->trang_thai == false ? 'checked' : '' }}>
                                                <label class="form-check-label text-danger" for="gridRadios2">
                                                    Ẩn
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
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
