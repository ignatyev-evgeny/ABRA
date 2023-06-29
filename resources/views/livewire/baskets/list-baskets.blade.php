<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>{{ __("List people baskets") }}</h2>
        </div>
    </main>
    <div class="bd-example mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center" scope="col">{{ __("ID") }}</th>
                    <th class="text-center" scope="col">{{ __("User") }}</th>
                    <th class="text-center" scope="col">{{ __("Products") }}</th>
                    <th class="text-center" scope="col">{{ __("Total amount") }}</th>
                    <th class="text-center" scope="col">{{ __("Actions") }}</th>
                </tr>
            </thead>
            <tbody>
            @if(count($baskets) > 0)
                @foreach ($baskets as $basket)
                    <tr>
                        <td class="text-center align-middle">
                            {{ $basket['id'] }}
                        </td>
                        <td class="text-center align-middle">
                            @if(!empty($basket->user_id))
                                [{{ $basket->user_id }}] {{ $basket->user->name }}
                            @else
                                {{ __('Guest') }}
                            @endif
                        </td>
                        <td class="text-center align-middle">
                            @php($totalPrice = 0)
                            @foreach($basket['goods'] as $product)
                                {{ $product['productName'] ?? 'NaN' }} - {{ $product['id'] }} | {{ $product['quantity'] }} x {{ $product['price_per_one'] }} USD = {{ $product['price_total'] }} USD<br>
                                @php($totalPrice += $product['price_total'])
                            @endforeach
                        </td>
                        <td class="text-center align-middle">
                            {{ $totalPrice }} USD
                        </td>
                        <td class="text-center align-middle">
                            <button wire:click="delete({{$basket['id']}})" class="btn btn-danger" type="button">{{ __('Delete') }}</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">
                        {{ __("No baskets") }}
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>