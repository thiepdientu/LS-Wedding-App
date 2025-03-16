<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingCard extends Model
{
    //
    protected $fillable = [
        'identifyWedding' ,  // Định danh thiệp
        'banner_preview' ,  // banner preview
        'template' ,  // mẫu thiệp
        'bride_name',           // Tên cô dâu
        'groom_name',           // Tên chú rể
        'des_bride',
        'des_groom',
        'banner_love_story',
        'love_story',
        'banner_top',           // Banner ảnh top
        'wedding_time',
        'wedding_message', 
        'name_place_wedding',   
        'wedding_date',         // Ngày tổ chức lễ thành hôn
        'address_wedding',      // Địa chỉ tổ chức lễ thành hôn
        'address_wedding_map',  // Bản đồ địa chỉ tổ chức lễ thành hôn
        'bride_birthday',       // Ngày sinh cô dâu
        'groom_birthday',         // Ngày sinh chú rể
        'groom_eating_title',
        'bride_eating_title',
        'groom_eating_date',
         'bride_eating_date',
         'message_invite',
         'message_gift',
         'message_thanks',
         'banner_thanks',
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
