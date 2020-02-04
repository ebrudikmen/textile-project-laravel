<?php /** @noinspection PhpUnused */



namespace App\Events\Auth;

use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SignedUp
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->$user= $user;
    }

}
