<?php
namespace Company\Organizations\States\Organization;

use Company\Organizations\States;

class Active extends OrganizationState
{
    public static string $name = 'active';

    public function color(): string
    {
        return 'primary';
    }
}
