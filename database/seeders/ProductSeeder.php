<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $product1 = [
            'name' => 'Valley Fruits',
            'description' => "“Hiếm có loài hoa nào đẹp như hoa hồng Ecuador” là câu đầu tiên được thốt lên khi trông thấy hồng Ecuador ngoài đời thật. Nữ hoàng hoa sở hữu kích thước vượt trội, thân dài, cánh hoa to, bản rộng và dày dặn. Bạn sẽ hình dung rõ được sự khác biệt hoàn toàn",
            'price' => '300',
            'inventory_number' => '100',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product2 = [
            'name' => 'Celebration Time',
            'description' => "Hoa mẫu đơn thường mang sự lãng mạn và vương vấn một chút e ấp. Một số người còn có quan niệm rằng loài hoa này là một loại bùa may mắn, đem lại sự thịnh vượng cho bất cứ ai nhận được. Mỗi màu của hoa mang những ý nghĩa sâu xa hơn.",
            'price' => '400',
            'inventory_number' => '80',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product3 = [
            'name' => 'Sweet Candy',
            'description' => "Nếu hoa mẫu đơn thường lãng mạn hay hoa hồng lộng lẫy, hoa cúc đỏ lại mang lại sức sống tràn trề. Đó là sự gắn kết, trân trọng, mang một năng lượng tích cực cho cuộc sống nhiều màu sắc hơn. Hoa cúc thường nở đẹp nhất vào mùa thu.",
            'price' => '500',
            'inventory_number' => '85',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product4 = [
            'name' => 'Sincere Gift',
            'description' => "Tương tự như hoa mẫu đơn, hoa Tulip là hình tượng của sự nổi tiếng, giàu có và một tình yêu trong sáng và hoàn hảo. Có thể do hoa luôn nở vào mùa xuân nên Tulip luôn chứa đựng những gì tinh túy nhất và trở thành biểu tượng của cuộc sống vĩnh hằng. ",
            'price' => '350',
            'inventory_number' => '90',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product5 = [
            'name' => 'Fancy',
            'description' => "Hoa lan hay còn được gọi là hoa phong lan, được xuất xứ từ Brazil và là biểu tượng đặc trưng cho sự sinh sôi nảy nở. Theo quan niệm của dân gian, hoa lan mang ý nghĩa vật chất và gia đình. Sắc đẹp của hoa lan như thu hút mọi trung tâm của vũ trụ.",
            'price' => '300',
            'inventory_number' => '80',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product6 = [
            'name' => 'Babe Princess',
            'description' => "Hướng dương là loài hoa thuộc họ Cúc, thường có màu sắc tươi sáng và rực rỡ được nhiều người yêu thích và lựa chọn để tặng vào những dịp lễ đặc biệt, trong đó có dịp 20/10 sắp đến. Loài hoa này luôn có màu vàng rực rỡ và hướng về phía mặt trời.",
            'price' => '500',
            'inventory_number' => '70',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product7 = [
            'name' => 'Sweet Day',
            'description' => $faker->sentence,
            'price' => '800',
            'inventory_number' => '60',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product8 = [
            'name' => 'Forever Love',
            'description' => $faker->sentence,
            'price' => '700',
            'inventory_number' => '50',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product9 = [
            'name' => 'Field Of Dreams',
            'description' => $faker->sentence,
            'price' => '1000',
            'inventory_number' => '100',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $product10 = [
            'name' => 'Devotion',
            'description' => $faker->sentence,
            'price' => '200',
            'inventory_number' => '100',
            'category_id' => rand(1, 10),
            'status_id'  => rand(1,2),
            'flg_del'    => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        Product::create($product1);
        Product::create($product2);
        Product::create($product3);
        Product::create($product4);
        Product::create($product5);
        Product::create($product6);
        Product::create($product7);
        Product::create($product8);
        Product::create($product9);
        Product::create($product10);
    }
}
