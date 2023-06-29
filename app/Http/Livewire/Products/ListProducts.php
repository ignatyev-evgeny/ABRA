<?php

namespace App\Http\Livewire\Products;

use App\Models\ProductModel;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;
use Livewire\Component;

class ListProducts extends Component {

    use WithFileUploads;

    public $name;
    public $price;
    public $image;

    public function save(): void {

        /** Validation rules */
        $validatedData = $this->validate([
            'name' => 'required|string',
            'price' => 'required|decimal:2',
            'image' => 'required|image|max:4096',
        ]);

        try {

            ProductModel::create([
                'name' => $validatedData['name'],
                'price' => $validatedData['price'],
                'image' => $this->image->store('images', 'public'),
            ]);

        } catch (Exception $exception) {

            Log::channel('productAdd')->critical("{$validatedData['name']} | {$validatedData['price']} - {$exception->getLine()} | {$exception->getMessage()}");
            $this->status = false;
            $this->addError('productAdd', __("An error occurred while adding a product"));

        }

    }

    public function delete(ProductModel $product): void {

        $product->delete();

    }

    public function getProductsProperty() {

        return ProductModel::get();

    }

    public function render() {

        return view('livewire.products.list-products', [
            'products' => $this->products
        ]);

    }
}
