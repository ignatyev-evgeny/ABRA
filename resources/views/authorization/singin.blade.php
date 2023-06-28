<x-layout>
    @vite('resources/css/signin.css')
    <main class="form-signin w-100 m-auto pt-5">
        <form>
            <h1 class="h3 mb-3 fw-normal">{{ __('Sign in') }}</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="{{ __('evgeny@ignatyev.pro') }}">
                <label for="floatingInput">{{ __('Email address') }}</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="{{ __('Password') }}">
                <label for="floatingPassword">{{ __('Password') }}</label>
            </div>
            <div class="form-floating text-center mt-1 mb-2">
                <a class="text-decoration-none" href="{{ route('main.signup') }}">{{ __('Sing up') }}</a>
            </div>
            <button class="btn btn-outline-success w-100 py-2" type="submit">{{ __('Sign in') }}</button>
        </form>
    </main>
</x-layout>