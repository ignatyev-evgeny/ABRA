<?php

namespace App\Http\Livewire;

use App\Models\BasketsModel;
use App\Models\ProductModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Session;

class MainPage extends Component {

    /** Add to basket method */
    public function addToCart(ProductModel $product): void {

        try {

            $bucket = Auth::check() ? BasketsModel::firstOrCreate(['user_id' => Auth::id()]) : BasketsModel::firstOrCreate(['session_id' => Session::getId()]);

            $goods = $bucket->goods;

            $goods[$product->id] = [
                'id' => $product->id,
                'quantity' => !empty($goods[$product->id]['quantity']) ? $goods[$product->id]['quantity'] + 1 : 1,
                'price_per_one' => $product->price,
                'price_total' => $product->price * (!empty($goods[$product->id]['quantity']) ? $goods[$product->id]['quantity'] + 1 : 1)
            ];

            $bucket->goods = $goods;
            $bucket->save();

            /** Start event productAdded */
            $this->emit('productAdded');

        } catch (Exception $exception) {

            Log::channel('mainPage')->critical("[addToCart] {$exception->getLine()} | {$exception->getMessage()}");

        }

    }

    public function getProductsProperty() {

        return ProductModel::get();

    }

    public function render() {

        return view('livewire.main-page', [
            'products' => $this->products,
        ]);

    }
}
