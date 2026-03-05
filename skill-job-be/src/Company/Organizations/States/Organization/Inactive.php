<?php
namespace Company\Organizations\States\Organization;

use Company\Organizations\States;

class Inactive extends OrganizationState
{
    public static string $name = 'inactive';

    public function color(): string
    {
        return 'warning';
    }

}
