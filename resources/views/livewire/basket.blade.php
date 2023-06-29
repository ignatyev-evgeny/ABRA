<div class="container">
    <main>
        <div class="py-5 text-center">
            <h2>{{ __('Your baskets') }}</h2>
        </div>
        <div class="row g-5">
            <div class="col-12">
                <ul class="list-group mb-3">
                    @foreach($goods as $key => $good)
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">{{ $good['productName'] }}</h6>
                            </div>
                            <span class="text-muted"><b>{{ $good['quantity'] }} x {{ $good['price_per_one'] }} = {{ $good['price_total'] }} USD</b></span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ __('Total') }} (USD)</span>
                        <strong><b>{{ $totalPrice }} USD</b></strong>
                    </li>
                </ul>

            </div>
        </div>
    </main>

</div>