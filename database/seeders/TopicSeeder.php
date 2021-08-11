<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('topics')->insert([
            [
                "id" => 1,
                "name" => "Các từ vựng thường gặp",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 2,
                "name" => "Vật nuôi",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 3,
                "name" => "Động vật hoang dã",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 4,
                "name" => "Các loại thú",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 5,
                "name" => "Các loại côn trùng",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 6,
                "name" => "Động vật lưỡng cư",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 7,
                "name" => "Động vật dưới nước",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 8,
                "name" => "Các loại rau",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 9,
                "name" => "Các loại củ/ quả",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 10,
                "name" => "Các loại trái cây",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 11,
                "name" => "Các loại đậu, hạt",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 12,
                "name" => "Các cấp học và trường học",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 13,
                "name" => "Cơ sở vật chất trường học",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 14,
                "name" => "Các môn học",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 15,
                "name" => "Phương tiện giao thông đường bộ",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 16,
                "name" => "Phương tiện giao thông đường thủy",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 17,
                "name" => "Phương tiện hàng không",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 18,
                "name" => "Phương tiện giao thông công cộng",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 19,
                "name" => "Các loại làn/ đường",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 20,
                "name" => "Danh từ tiếng Anh về môi trường",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 21,
                "name" => "Động từ tiếng Anh về môi trường",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 22,
                "name" => "Tính từ tiếng Anh về môi trường",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 23,
                "name" => "Bộ phận máy móc và các thiết bị Công nghệ",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],
            [
                "id" => 24,
                "name" => "Thuật ngữ về Công nghệ hay được sử dụng",
                "mark_app_default" => true,
                "mark_user_default" => false,
                "user_id" => null,
            ],

        ]);
    }
}
