<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>{{ __("List products") }}</h2>
        </div>
        <div class="row g-5">
            <div class="col-12">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">{{ __('Product name') }}</label>
                            <input wire:model.defer="name" name="name" type="text" class="form-control">
                            @error('name') <div class="invalid-feedback d-block"> {{ $message }} </div> @enderror
                        </div>
                        <div class="col-4">
                            <label class="form-label">{{ __('Product price') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">USD</span>
                                <input wire:model.defer="price" name="price" type="number" min="0.01" step="0.01" class="form-control">
                                @error('price') <div class="invalid-feedback d-block"> {{ $message }} </div> @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">{{ __('Product image') }}</label>
                            <input wire:model.defer="image" name="image" class="form-control" type="file">
                            @error('image') <div class="invalid-feedback d-block"> {{ $message }} </div> @enderror
                        </div>
                    </div>
                    <button class="w-100 btn btn-outline-success btn-lg mt-4" type="submit">{{ __('Add product') }}</button>
                </form>
            </div>
        </div>
    </main>
    <div class="bd-example mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center" scope="col">{{ __("ID") }}</th>
                    <th class="text-center" scope="col">{{ __("Name") }}</th>
                    <th class="text-center" scope="col">{{ __("Price") }}</th>
                    <th class="text-center" scope="col">{{ __("Image") }}</th>
                    <th class="text-center" scope="col">{{ __("Actions") }}</th>
                </tr>
            </thead>
            <tbody>
            @if(count($products) > 0)
                @foreach ($products as $index => $product)
                    <form>
                        <tr>
                            <td class="text-center align-middle">
                                {{ $product->id }}
                            </td>
                            <td class="text-center align-middle">
                                {{ $product->name }}
                            </td>
                            <td class="text-center align-middle">
                                {{ $product->price }} USD
                            </td>
                            <td class="text-center">
                                <a href="{{ asset('storage/'.$product->image) }}">
                                    <img class="cabinet-product-list-img" src="{{ asset('storage/'.$product->image) }}">
                                </a>
                            </td>
                            <td class="text-center">
                                <button wire:click="delete({{$product->id}})" class="btn btn-danger" type="button">{{ __('Delete') }}</button>
                            </td>
                        </tr>
                    </form>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">
                        {{ __("No products in shop") }}
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>