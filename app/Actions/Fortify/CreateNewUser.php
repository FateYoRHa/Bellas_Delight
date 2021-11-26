<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
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
<<<<<<< Updated upstream

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'firstName' => $input['firstName'],
                'lastName' => $input['lastName'],
                'contactNumber' => $input['contactNumber'],
                'address' => $input['address'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->firstName, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
=======
        // return DB::transaction(function () use ($input) {
        //     return tap(User::create([
        //         'firstName' => $input['firstName'],
        //         'lastName' => $input['lastName'],
        //         'contactNumber' => $input['contactNumber'],
        //         'address' => $input['address'],
        //         'email' => $input['email'],
        //         'password' => Hash::make($input['password']),
        //     ]), function (User $user){
        //         $user->attachRole('3');
        //         return $user;
        //     });
        // });
        $user = User::create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'contactNumber' => $input['contactNumber'],
            'address' => $input['address'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $user->attachRole('3');
        return $user;
>>>>>>> Stashed changes
    }
}
