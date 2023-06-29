<?php

namespace App\Http\Livewire\Baskets;

use App\Http\Controllers\BasketController;
use App\Models\BasketsModel;
use Livewire\Component;

class ListBaskets extends Component {

    /** Method delete basket */
    public function delete(BasketsModel $basket): void {
        $this->emit('basketDelete');
        $basket->delete();
    }

    public function getBasketsProperty() {

        foreach (BasketsModel::all() as $basket) {
            $basket->goods = BasketController::getProductNameInBasket($basket);
            $baskets[] = $basket;
        }

        return $baskets;

    }

    public function render() {

        return view('livewire.baskets.list-baskets', [
            'baskets' => $this->baskets
        ]);

    }
}
