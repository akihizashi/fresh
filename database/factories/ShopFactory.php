<?php

use Faker\Generator as Faker;

$factory->define(App\Shop::class, function (Faker $faker) {
    return [
      'name' => '果物'.rand(1000, 10000),
      'code' => $faker->ean8,
      'image' => $faker->randomElement(['product_image1.jpg', 'product_image2.jpg', 'product_image3.jpg', 'product_image4.jpg', 'product_image5.jpg', 'product_image6.jpg', 'product_image7.jpg', 'product_image8.jpg', 'product_image9.jpg', 'product_image10.jpg', 'product_image11.jpg', 'product_image12.jpg', 'product_image13.jpg', 'product_image14.jpg', 'product_image15.jpg', 'product_image16.jpg', 'product_image17.jpg', 'product_image18.jpg', 'product_image19.jpg', 'product_image20.jpg']),
      'category' => $faker->randomElement(['piece', 'package']),
      'reposition' => rand(0, 99),
      'price' => rand(500, 2000),
      'release' => $faker->date('Y-m-d'),
      'description' => '<p>美味しい果物を買ってください</p>',
      'created_at' => new Datetime,
      'updated_at' => new Datetime,
    ];
});
