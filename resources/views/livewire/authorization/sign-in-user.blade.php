<main class="form-signin w-100 m-auto pt-5">

    <form wire:submit.prevent="signIn">
        <h1 class="h3 mb-3 fw-normal">{{ __('Sign in') }}</h1>
        <div class="form-floating">
            <input wire:model="email" name="email" type="email" @disabled($status) class="form-control @error('email') is-invalid @enderror mb-0" placeholder="{{ __('evgeny@ignatyev.pro') }}">
            <label>{{ __('Email address') }}</label>
            @error('email') <div class="invalid-feedback mb-1"> {{ $message }} </div> @enderror
        </div>
        <div class="form-floating">
            <input wire:model="password" name="password" type="password" @disabled($status) class="form-control @error('password') is-invalid @enderror mb-0" placeholder="{{ __('Password') }}">
            <label>{{ __('Password') }}</label>
            @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
        <div class="form-floating text-center mt-1 mb-2">
            <a class="text-decoration-none" href="{{ route('main.signup') }}">{{ __('Sing up') }}</a>
        </div>
        <button class="btn btn-outline-success w-100 py-2" @disabled($status) type="submit">{{ __('Sign in') }}</button>
    </form>

    @if($signInError)
        <div class="bd-example mt-3">
            <div class="alert alert-danger" role="alert">
                <p class="mb-0">{!! $signInError !!}</p>
            </div>
        </div>
    @endif

</main>