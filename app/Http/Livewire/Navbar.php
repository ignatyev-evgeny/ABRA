<?php

namespace App\Http\Livewire;

use App\Models\BasketsModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Session;

class Navbar extends Component {
    public $basketCount;

    /** Event listeners */
    protected $listeners = [
        'productAdded' => 'incrementBasketCount',
        'basketDelete' => 'resetBasket',
    ];

    public function mount(): void {

        try {

            $bucket = Auth::check() ? BasketsModel::where(['user_id' => Auth::id()])->first() : BasketsModel::where(['session_id' => Session::getId()])->first();
            if (empty($bucket)) {
                $this->basketCount = 0;
            } else {
                $goodsCount = 0;
                foreach ($bucket->goods as $good) {
                    $goodsCount += $good['quantity'];
                }
                $this->basketCount = $goodsCount;
            }

        } catch (Exception $exception) {

            Log::channel('navbar')->critical("{$exception->getLine()} | {$exception->getMessage()}");

        }
    }

    public function incrementBasketCount(): void {

        $this->basketCount++;

    }

    public function resetBasket(): void {

        $this->basketCount = 0;

    }

    public function render() {

        return view('livewire.navbar', []);

    }
}
