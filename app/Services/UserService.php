<?php

namespace App\Services;

use App\Models\User;

class UserService{

    /**
     * @var User
     */
    protected $user;

    /**
     * UserService constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Method to find User by Email
     *
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findByEmail($email)
    {
        return $this->user->all()->where('email', '=', $email)->first();
    }

}