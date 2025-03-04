<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingCard extends Model
{
    //
    protected $fillable = [
        'bride_name',           // Tên cô dâu
        'groom_name',           // Tên chú rể
        'banner_top',           // Banner ảnh top
        'wedding_date',         // Ngày tổ chức lễ thành hôn
        'address_wedding',      // Địa chỉ tổ chức lễ thành hôn
        'address_wedding_map',  // Bản đồ địa chỉ tổ chức lễ thành hôn
        'bride_birthday',       // Ngày sinh cô dâu
        'groom_birday',         // Ngày sinh chú rể
        'bride_avatar',         // Ảnh đại diện cô dâu
        'groom_avatar',         // Ảnh đại diện chú rể
        'banner_coundown',      // Banner đếm ngược
        'album',                // Album ảnh (lưu dạng JSON)
        'date_coundown',        // Ngày đếm ngược
        'address_groom',        // Địa chỉ chú rể
        'address_bride',        // Địa chỉ cô dâu
        'time_groom',           // Thời gian mời cỗ chú rể (Dương lịch)
        'time_groom_al',        // Thời gian mời cỗ chú rể (Âm lịch)
        'time_bride',           // Thời gian mời cỗ cô dâu (Dương lịch)
        'time_bride_al',        // Thời gian mời cỗ cô dâu (Âm lịch)
        'bride_phone',          // Số điện thoại cô dâu
        'groom_phone',          // Số điện thoại chú rể
        'groom_qr',             // Mã QR chú rể
        'bride_qr',             // Mã QR cô dâu
        'groom_map',            // Bản đồ nhà chú rể
        'bride_map',            // Bản đồ nhà cô dâu
    ];
}
