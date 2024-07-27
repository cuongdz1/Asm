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
                    <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục sản phẩm</h4>
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
                        <form action="{{ route('admins.danhmucs.update',$danhMuc->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                                        <input type="text" id="ten_danh_muc" name="ten_danh_muc"
                                            class="form-control 
                                        @error('ten_danh_muc') is-invalid @enderror"
                                            value="{{$danhMuc->ten_danh_muc}}">
                                        @error('ten_danh_muc')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="hinh_anh" class="form-label">Hình ảnh</label>
                                        <input type="file" id="hinh_anh" name="hinh_anh"
                                            class="form-control">
                                <img  src="{{ Storage::url($danhMuc->hinh_anh) }}" alt="Hình ảnh sản phẩm" id="img_DM" onchange="showImage(event)" style="width: 100px;">
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Trạng thái</legend>
                                    <div class="col-sm-10 d-flex gap-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trang_thai"
                                                id="trang_thai" value="1" {{ $danhMuc->trang_thai == true ? 'checked' : ''}} >
                                            <label class="form-check-label text-info" for="gridRadios1">
                                                Hiển thị
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trang_thai"
                                                id="trang_thai" value="0" {{$danhMuc->trang_thai == false ? 'checked' : ''}}>
                                            <label class="form-check-label text-danger" for="gridRadios2">
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info">Submit</button>
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

<script>
    function showImage (event){
        const img_DM = document.getElementById('img_DM');

        const file = event.target.files[0];

        const reader = new FileReader();

        reader.onload = function (){
            img_DM.src = reader.result;
            img_DM.style.display = 'block';
        }

        if(file){
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
