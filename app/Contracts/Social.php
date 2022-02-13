<?php

declare(strict_types=1);

namespace App\Contracts;

use Laravel\Socialite\Contracts\User;

/**
 * @param User $socialUser
 * @param string $network
 * @return string
 */

interface Social
{
    public function setUser(User $socialUser, string $network): string;
}
