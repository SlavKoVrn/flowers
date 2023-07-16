<?php

namespace console\controllers;

use common\models\City;
use common\models\CityProduct;
use common\models\Product;
use Faker\Factory;
use yii\console\Controller;
use yii\db\Migration;

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

    public function actionCity()
    {
        $migration = new Migration;
        $migration->truncateTable(CityProduct::tableName());

        $faker = Factory::create('ru_RU');
        $products = Product::find()->all();
        $cities = City::find()->all();
        $i=0;
        foreach ($products as $product) {
            foreach ($cities as $city){
                $i++;
                $city_product = new CityProduct;
                $city_product->setAttributes([
                    'product_id'=>$product->id,
                    'city_id'=>$city->id,
                    'name' => $faker->realText(22),
                    'price' => random_int(100, 1000),
                    'description' => $faker->realText(1000),
                ]);
                $city_product->save();
                echo "$i. $city_product->id. $city_product->name - $city_product->slug\n";
            }
        }
    }
}
