<?php

namespace App\Http\Livewire;

use App\Http\Controllers\BasketController;
use App\Models\BasketsModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Session;

class Basket extends Component {

    public function mount() {

        $basket = Auth::check() ? BasketsModel::where(['user_id' => Auth::id()])->first() : [];
        $basket = !Auth::check() && empty($basket) ? BasketsModel::where(['session_id' => Session::getId()])->first() : $basket;

        if (!empty($basket->goods)) {

            $totalPrice = 0;

            $goods = BasketController::getProductNameInBasket($basket);

            foreach ($goods as $element) {
                $totalPrice += $element['price_total'];
            }

            $this->goods = $goods;
            $this->totalPrice = $totalPrice;

        } else {

            $this->goods = [];
            $this->totalPrice = 0;

        }
    }

    public function render() {

        return view('livewire.basket', []);
        
    }
}
