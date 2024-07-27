<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThaiDonHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_trang_thai',
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class);
    }
}
