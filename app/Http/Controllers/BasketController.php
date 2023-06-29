<?php

namespace App\Http\Controllers;

use App\Models\BasketsModel;
use App\Models\ProductModel;

class BasketController extends Controller {

    /** Get page from auth area to baskets list */
    public function list() {
        return view('cabinet.baskets.list');
    }

    /** Get product name in basket */
    public static function getProductNameInBasket(BasketsModel $basket) {

        if (empty($basket)) {
            return false;
        }

        $goods = $basket->goods;

        $updateBasket = false;

        foreach ($goods as $key => $element) {

            $product = ProductModel::find($key);

            if (empty($product)) {
                unset($goods[$key]);
                $updateBasket = true;
                continue;
            }

            $goods[$key]['productName'] = $product->name;
        }

        if ($updateBasket === true) {
            $basket->goods = $goods;
            $basket->save();
        }

        return $goods;

    }
}
