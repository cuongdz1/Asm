<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;

class TaikhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Danh sách tài khoản";

        $listTK = DB::table("users")
            ->orderBy("id", "desc")
            ->get();

        return view("admins.taikhoans.index", compact("title", "listTK"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm tài khoản";

        $listrole = User::firstOrFail();

        return view("admins.taikhoans.create", compact("title", "listrole"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod("POST")) {
            $param = $request->except("_token");

            User::create($param);
            return redirect()->route('admins.taikhoans.index')->with('success', 'Thêm tài khoản thành công!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Chỉnh sửa tài khoản";

        $taikhoan = User::findOrFail($id);

        return view("admins.taikhoans.update", compact("title", "taikhoan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod("PUT")) {
            $param = $request->except("_token", "_method");

            $taikhoan = User::findOrFail($id);

            $taikhoan->update($param);

            return redirect()->route('admins.taikhoans.index')->with('success', 'Cập nhật tài khoản thành công!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $taikhoan = User::findOrFail($id);
        $taikhoan->delete();
        
        return redirect()->route('admins.taikhoans.index')->with('error', 'Bạn vừa xóa 1 tài khoản!!');
    }
}
