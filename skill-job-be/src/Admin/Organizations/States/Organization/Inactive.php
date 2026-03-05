<?php
namespace Admin\Organizations\States\Organization;

use Admin\Organizations\States;

class Inactive extends OrganizationState
{
    public static string $name = 'inactive';

    public function color(): string
    {
        return 'warning';
    }

}
