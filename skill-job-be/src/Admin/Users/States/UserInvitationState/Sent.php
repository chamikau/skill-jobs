<?php
namespace Admin\Users\States\UserInvitationState;

class Sent extends UserInvitationState
{
    public static string $name = 'sent';

    public function color(): string
    {
        return 'primary';
    }
}
