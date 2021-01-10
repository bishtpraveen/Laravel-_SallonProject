<?php
namespace App\Services;
use App\SocialAuthGoogleController;
use App\register;
use Session;
use Laravel\Socialite\Contracts\User as ProviderUser;
class SocialGoogleAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAuthGoogleController::whereProvider('google')
            ->whereProviderUserId($providerUser->getId())
            ->first();
if ($account) {
            return $account->user;
        } else {
$account = new SocialAuthGoogleController([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google'  
            ]);
$user = register::whereEmail($providerUser->getEmail())->first();
if (!$user) {
    $user = register::create([
        'provider_user_id' => $providerUser->getId(),
        'email' => $providerUser->getEmail(),
        // 'name' => $providerUser->getName(),
        // 'password' => md5(rand(1,10000)),
        ]);
    }
    $account->user()->associate($user);
    $account->save();
return $user;
        }
    }
}