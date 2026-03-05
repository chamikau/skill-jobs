<?php
namespace Company\Jobs\States\Job;

use Company\Jobs\States;

class Active extends JobState
{
    public static string $name = 'active';

    public function color(): string
    {
        return 'primary';
    }
}
