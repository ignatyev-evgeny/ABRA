<main class="form-signup w-100 m-auto pt-5">
    <form method="POST" wire:submit.prevent="signUp">
        <h1 class="h3 mb-3 fw-normal">{{ __('Sign up') }}</h1>
        <div class="form-floating">
            <input wire:model="name" name="name" type="text" @disabled($status) class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="{{ __('Evgeny Ignatiev') }}">
            <label for="floatingInput">{{ __('Name') }}</label>
            @error('name') <div id="validationServerUsernameFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
        <div class="form-floating">
            <input wire:model="email" name="email" type="email" @disabled($status) class="form-control @error('email') is-invalid @enderror" id="floatingInput"  placeholder="{{ __('evgeny@ignatyev.pro') }}">
            <label for="floatingInput">{{ __('Email address') }}</label>
            @error('email') <div id="validationServerUsernameFeedback" class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
        <div class="form-floating text-center mt-1 mb-2">
            <a class="text-decoration-none" href="{{ route('main.signin') }}">{{ __('Sing in') }}</a>
        </div>
        <button class="btn btn-outline-success w-100 py-2" @disabled($status) type="submit">{{ __('Sign up') }}</button>
    </form>

    @if($status)
        <div class="bd-example mt-3">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">{{ __('Well done!')  }}</h4>
                <p class="mb-1">{{ __('Sign in Email') }}: <b>{{ $userEmail }}</b></p>
                <p>{{ __('Sign in Password') }}: <b>{{ $userPassword }}</b></p>
                <hr>
                <p class="mb-0">{{ __('The generated password was also sent to the email') }}</p>
            </div>
        </div>
    @endif

    @if($signUpError)
        <div class="bd-example mt-3">
            <div class="alert alert-danger" role="alert">
                <p class="mb-0">{!! $signUpError !!}</p>
            </div>
        </div>
    @endif
</main>