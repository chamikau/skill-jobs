<?php
namespace Student\Jobs\States\Job;

//use Student\Jobs\States;

class Active extends JobState
{
    public static string $name = 'active';

    public function color(): string
    {
        return 'primary';
    }
}
