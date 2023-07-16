<?php
namespace common\components;

use common\models\City;

class ProductRule extends \yii\web\UrlRule
{
    public function createUrl($manager, $route, $params)
    {
        if ($route === 'product/view' and isset($params['city'],$params['slug'])) {
            return $params['city'].'/flower/'.$params['slug'];
        }
        if ($route === 'product/view' and isset($params['slug'])) {
            return 'flower/'.$params['slug'];
        }
        if ($route === 'city-product/index' and isset($params['city_id'])) {
            $city = City::findOne($params['city_id']);
            return $city->code.'/flowers';
        }
        return false;
    }

    public function parseRequest($manager, $request)
    {
        $url = trim($request->pathInfo, '/');
        $explode = explode('/',$url);
        $city = City::find()->where(['code' => $explode[0]])->one();
        if ($city){
            if ($explode[1] == 'flowers' and count($explode) == 2){
                return ['city-product/index', ['city_id' => $city->id ]];
            }
            if ($explode[1] == 'flower' and count($explode) == 3){
                return ['product/view', ['city'=> $city->code, 'slug' => $explode[2] ]];
            }
        }
        if (empty($explode[0])){
            return ['product/index', []];
        }
        if ($explode[0] == 'flowers' and count($explode) == 1){
            return ['product/index', []];
        }
        if ($explode[0] == 'flower' and count($explode) == 2){
            return ['product/view', ['slug' => $explode[1] ]];
        }
        return false;
    }
}
