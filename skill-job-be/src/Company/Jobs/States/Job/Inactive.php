<?php
namespace Company\Jobs\States\Job;

use Company\Jobs\States;

class Inactive extends JobState
{
    public static string $name = 'inactive';

    public function color(): string
    {
        return 'warning';
    }

}
