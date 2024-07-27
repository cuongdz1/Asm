<?php

namespace App\Http\Controllers\Admin;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Danh sách sản phẩm";

        $listSp = SanPham::orderByDesc("is_type")->get();

        return view("admins.sanphams.index", compact("title","listSp"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm sản phẩm";

        $listDanhMuc = DanhMuc::query()->get();

        return view("admins.sanphams.create", compact("title","listDanhMuc"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
    {
        if($request->isMethod('POST')){
            $param = $request->except('_token');

            // chuyển đổi giá trị Checkbox thành boolean
            $param['is_new'] = $request->has('is_new') ? 1 : 0;
            $param['is_hot'] = $request->has('is_hot') ? 1 : 0;
            $param['is_hot_deal'] = $request->has('is_hot_deal') ? 1 : 0;
            $param['is_show_home'] = $request->has('is_show_home') ? 1 : 0;

            // xử lý hình ảnh đại diện

            if($request->hasFile('hinh_anh')){
                $param['hinh_anh'] = $request->file('hinh_anh')->store('uploads/sanphams','public');
            }else{
                $param['hinh_anh'] = null;            
            }

            // thêm sản phẩm

            $sanPham = SanPham::create($param);

            // lấy id sản phẩm vừa thêm để thêm được album

            $sanPhamID = $sanPham->id;

            // xử lý album

            if($request->hasFile('list_hinh_anh')){
                foreach($request->file('list_hinh_anh') as $image){
                    if($image){
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $sanPhamID, 'public');
                        $sanPham->hinhAnhSanPham()->create([
                            'san_pham_id' => $sanPhamID,
                            'hinh_anh'=> $path
                    ]);
                    }
                }

        }
        return redirect()->route('admins.sanphams.index')->with('success','Thêm sản phẩm thành công!');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Chi tiết sản phẩm";

        $listdetail = SanPham::orderByDesc("id")->get();

        return view("admins.sanphams.detail", compact("title","listdetail"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sanPham = SanPham::findOrFail($id);

        // Xóa hình ảnh đại diện sản phẩm
        if($sanPham->hinh_anh && Storage::disk('public')->exists($sanPham->hinh_anh)){
            Storage::disk('public')->delete($sanPham->hinh_anh);
        }

        // xóa

        $sanPham->hinhAnhSanPham()->delete();

        // xóa toàn bộ hình ảnh trong giao diện

        $path ='uploads/hinhanhsanpham/id_' . $id;
        if(Storage::disk('public')->exists($path)){
            Storage::disk('public')->deleteDirectory($path);
            // dd($path);

        }

// Xóa sản phẩm

        $sanPham->delete();

        return redirect()->route('admins.sanphams.index')->with('erorr','Vừa xóa 1 sản phẩm');

    }
}
