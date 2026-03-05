<?php
namespace Admin\Organizations\States\Organization;

use Admin\Organizations\States;

class Active extends OrganizationState
{
    public static string $name = 'active';

    public function color(): string
    {
        return 'primary';
    }
}
