<?php

//declare(strict_types=1);

namespace App\Services;

use App\Contracts\Social;
use App\Models\User as ModelsUser;
use Exception;
use Laravel\Socialite\Contracts\User;

/**
 * @param User $socialUser
 * @param string $network
 * @return string
 */

class SocialService implements Social
{
    public function setUser(User $socialUser, string $network): string
    {

        $user = ModelsUser::query()->where('email', $socialUser->getEmail())->first();

        //dd($socialUser->name);

        if ($user) {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();

            if ($user->save()) {
                \Auth::loginUsingId($user->id);

                return route('account');
            } else {

                throw new Exception("Ошибка авторизации через социальную сеть " . $network);
            }
        } else {
            // необходима регистрация
            //  dd( $socialUser->user['email']);

            session(["socialUser" => [
                'email' => $socialUser->getEmail(),
                'first_name' => $socialUser->getNickname(),
                'name' => $socialUser->getName(),
            ]]);

            return route('register');
        }
    }
}
