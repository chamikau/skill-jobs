<?php

namespace Company\Organizations\States\Organization;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class OrganizationState extends State
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
