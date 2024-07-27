<?php

use App\Models\PhuongThucThanhToan;
use App\Models\TrangThaiDonHang;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang');
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('sdt_nguoi_nhan');
            $table->string('gioi_tinh');
            $table->string('dia_chi_nguoi_nhan');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(TrangThaiDonHang::class)->constrained();
            $table->date('ngay_dat');
            $table->string('tong_tien');
            $table->string('ghi_chu');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
