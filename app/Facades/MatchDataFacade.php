<?php

namespace App\Facades;

use App\Action\MatchDataActions;

class MatchDataFacade
{
    static function __callStatic($name,$args)
    {
        return (new MatchDataActions)->$name(...$args);
    }
}
