<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */

    public function create(array $input)
    {
        Validator::make($input, [
            'firstName' => ['required', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'lastName' => ['required', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'contactNumber' => ['required', 'regex:/[01][0-9]{9}/', 'min:10', 'max:12'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'contactNumber' => $input['contactNumber'],
            'address' => $input['address'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
