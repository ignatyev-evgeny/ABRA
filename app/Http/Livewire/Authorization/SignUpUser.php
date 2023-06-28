<?php

namespace App\Http\Livewire\Authorization;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SignUpUser extends Component {

    public $name;
    public $email;
    public $status;
    public $userPassword;
    public $signUpError;

    protected $rules = [
        'name' => 'required|min:10|max:100',
        'email' => 'required|email|unique:users,email',
    ];

    public function signUp() {

        $this->validate();
        $this->userPassword = uuid_create();

        try {
            $newUser = User::create([
                'name' => $this->name,
                //            'email' => $this->email,
                'email' => 'togojise@mailinator.com',
                'password' => Hash::make(md5($this->userPassword), [
                    'rounds' => 12,
                ])
            ]);
            $this->status = (bool) $newUser;
        } catch (Exception $exception) {
            Log::channel('signup')->critical("{$this->name} | {$this->email} | {$this->userPassword} - {$exception->getLine()} | {$exception->getMessage()}");
            $this->signUpError = __("User <b>{$this->name}</b> registration error");
        }

    }

    public function render() {
        return view('livewire.authorization.sign-up-user', [
            'status' => $this->status,
            'userEmail' => $this->email,
            'userPassword' => $this->userPassword,
        ]);
    }

}
