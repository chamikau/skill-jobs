<?php

namespace Student\Jobs\States\Job;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class JobState extends State
{
    abstract public function color(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Active::class)
            ->allowTransition(Active::class, Inactive::class)
        ->allowTransition(Inactive::class, Active::class);
    }
}
