<?php

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
        Schema::create('wedding_cards', function (Blueprint $table) {
            $table->id();
            $table->string('bride_name'); // tên cô dâu
            $table->string('groom_name'); // tên chú rể
            $table->string('banner_top'); // banner ảnh top
            $table->date('wedding_date'); // Ngày tổ chức lễ thành hôn
            $table->string('address_wedding'); // Địa chỉ tổ chức lễ thành hôn
            $table->string('address_wedding_map'); // map địa chỉ tổ chức lễ thành hôn
            $table->date('bride_birthday'); // Ngày sinh cô dâu
            $table->date('groom_birday'); // Ngày sinh chú rể
            $table->string('bride_avatar'); // avatar cô dâu
            $table->string('groom_avatar'); // avatar chú rể
            $table->string('banner_coundown'); // banner coundown
            $table->string('album'); // album ảnh
            $table->string('date_coundown'); // date coundown
            $table->string('address_groom'); // Địa chỉ chú rể
            $table->string('address_bride'); // Địa chỉ cô dâu
            $table->string('time_groom'); // Thời gian mời cỗ chú rể dương lịch
            $table->string('time_groom_al'); // Thời gian mời cỗ chú rể âm lịch
            $table->string('time_bride'); // Thời gian mời cỗ cô dâu dương lịch
            $table->string('time_bride_al'); // Thời gian mời cỗ cô dâu âm lịch
            $table->string('bride_phone'); // số điện thoại cô dâu
            $table->string('groom_phone'); // số điện thoại chú rể
            $table->string('groom_qr'); // qr chú rể
            $table->string('bride_qr'); // qr cô dâu
            $table->string('groom_map'); // map chú rể
            $table->string('bride_map'); // map cô dâu

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_cards');
    }
};
