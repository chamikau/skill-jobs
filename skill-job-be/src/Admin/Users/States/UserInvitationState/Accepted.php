<?php
namespace Admin\Users\States\UserInvitationState;

class Accepted extends UserInvitationState
{
    public static string $name = 'accepted';

    public function color(): string
    {
        return 'primary';
    }
}
