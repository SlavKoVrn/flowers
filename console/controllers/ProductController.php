<?php

namespace console\controllers;

use common\models\Product;
use Faker\Factory;
use yii\console\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $faker = Factory::create('ru_RU');
        for ($i = 1; $i <= 100; $i++) {
            $product = new Product;
            $product->setAttributes([
                'name' => $faker->realText(22),
                'price' => random_int(100, 1000),
                'description' => $faker->realText(1000),
            ]);
            $product->save();
            echo "$product->id. $product->name - $product->slug\n";
        }
    }
}
