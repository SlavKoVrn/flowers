<?php
namespace common\components;

class ProductRule extends \yii\web\UrlRule
{
    public function createUrl($manager, $route, $params)
    {
        if ($route === 'product/view' and isset($params['city'],$params['slug'])) {
            return 'flowers/'.$params['city'].'/'.$params['slug'];
        }
        if ($route === 'product/view' and isset($params['slug'])) {
            return 'flowers/'.$params['slug'];
        }
        return false;
    }

    public function parseRequest($manager, $request)
    {
        $url = trim($request->pathInfo, '/');
        $explode = explode('/',$url);
        if (empty($explode[0])){
            return ['product/index', []];
        }
        if ($explode[0] == 'flowers' and count($explode) == 1){
            return ['product/index', []];
        }
        if ($explode[0] == 'flowers' and count($explode) == 2){
            return ['product/view', ['slug' => $explode[1] ]];
        }
        if ($explode[0] == 'flowers' and count($explode) == 3){
            return ['product/view', ['city' => $explode[1],'slug' => $explode[2] ]];
        }
        return false;
    }
}
