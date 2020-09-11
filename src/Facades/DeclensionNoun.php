<?php

namespace Drandin\DeclensionNouns\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DeclensionNoun
 * @package Drandin\DeclensionNouns\Facades
 */
class DeclensionNoun extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'DeclensionNoun';
    }

}
