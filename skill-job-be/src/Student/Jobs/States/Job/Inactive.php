<?php
namespace Student\Jobs\States\Job;

use Student\Jobs\States;

class Inactive extends JobState
{
    public static string $name = 'inactive';

    public function color(): string
    {
        return 'warning';
    }

}
