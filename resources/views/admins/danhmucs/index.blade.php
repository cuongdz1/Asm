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
                    <div class="card-header d-flex justify-content-between ">
                        <h5 class="card-title mb-0 align-content-center">{{ $title }}</h5>

                        <a href="{{ route('admins.danhmucs.create') }}" class="btn btn-success "><i
                                data-feather="plus-square"></i>Thêm danh mục</a>
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
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listDanhmuc as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>
                                                <img src="{{ Storage::url($item->hinh_anh) }}" width="100px" height="60px"
                                                    alt="">
                                            </td>
                                            <td>{{ $item->ten_danh_muc }}</td>
                                            <td class="{{ $item->trang_thai == true ? 'text-info' : 'text-danger' }}">
                                                {{ $item->trang_thai == true ? 'Hiển thị' : 'Ẩn' }}</td>
                                            <td>
                                                
                                                <a href="{{ route('admins.danhmucs.edit', $item->id) }}"><i
                                                        class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>

                                                <form action="{{ route('admins.danhmucs.destroy',$item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-white">
                                                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" onclick="return(confirm('Bạn có muốn xóa không ??'))"></i>

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
