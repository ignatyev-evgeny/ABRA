<?php

namespace App\Http\Livewire\Authorization;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SignInUser extends Component {

    public $email;
    public $password;
    public $status;
    public $signInError;

    /** Validation rules */
    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
    ];

    /** User authorization method */
    public function signIn() {

        $this->validate();

        try {

            $user = User::where('email', $this->email)->first();

            if (Hash::check($this->password, $user->password)) {

                Auth::login($user);
                $this->status = true;
                return redirect()->to('/');

            }

            $this->status = false;
            $this->addError('password', __("Password mismatch"));

        } catch (Exception $exception) {

            Log::channel('signin')->critical("$this->email | $this->password - {$exception->getLine()} | {$exception->getMessage()}");
            $this->status = false;
            $this->signInError = __("User <b>$this->email</b> sign in error");

        }

    }

    public function render() {

        return view('livewire.authorization.sign-in-user', [
            'status' => $this->status,
            'signInError' => $this->signInError
        ]);

    }
}
