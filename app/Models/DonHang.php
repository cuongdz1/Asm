<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_don_hang',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'sdt_nguoi_nhan',
        'gioi_tinh',
        'dia_chi_nguoi_nhan',
        'user_id',
        'trang_thai_don_hang_id',
        'ngay_dat',
        'tong_tien',
        'ghi_chu',
    ];

    protected $casts = [
        'gioi_tinh' => 'boolean',
    ];

    public function Trangthai()
    {
        return $this->belongsTo(TrangThaiDonHang::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
