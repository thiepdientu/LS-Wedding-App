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
            $table->longText('banner_top'); // banner ảnh top
            $table->date('wedding_date'); // Ngày tổ chức lễ thành hôn
            $table->longText('wedding_message'); //message lễ thành hôn
            $table->string('address_wedding'); // Địa chỉ tổ chức lễ thành hôn
            $table->string('address_wedding_map'); // map địa chỉ tổ chức lễ thành hôn
            $table->date('bride_birthday'); // Ngày sinh cô dâu
            $table->date('groom_birthday'); // Ngày sinh chú rể
            $table->longText('bride_avatar'); // avatar cô dâu
            $table->longText('groom_avatar'); // avatar chú rể
            $table->longText('banner_coundown'); // banner coundown
            $table->longText('album'); // album ảnh
            $table->string('date_coundown'); // date coundown
            $table->string('address_groom'); // Địa chỉ chú rể
            $table->string('address_bride'); // Địa chỉ cô dâu
            $table->longText('groom_eating_title'); // Title cỗ nhà trai
            $table->longText('bride_eating_title'); // Title cỗ nhà gái
            $table->date('groom_eating_date'); // Ngày ăn cỗ nhà trai dương
            $table->date('bride_eating_date'); // Ngày ăn cỗ nhà gái dương
            $table->string('time_groom'); // giờ mời cỗ chú rể dương lịch
            $table->string('time_groom_al'); // Thời gian mời cỗ chú rể âm lịch
            $table->string('time_bride'); // Tgờ mời cỗ cô dâu dương lịch
            $table->string('time_bride_al'); // Thời gian mời cỗ cô dâu âm lịch
            $table->string('bride_phone'); // số điện thoại cô dâu
            $table->string('groom_phone'); // số điện thoại chú rể
            $table->longText('message_invite'); // title mời chén
            $table->longText('message_gift'); // gửi quà
            $table->longText('message_thanks'); // cảm ơn
            $table->longText('banner_thanks'); // cảm ơn
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
