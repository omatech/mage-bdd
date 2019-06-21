<?php

namespace Omatech\MageBdd;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Omatech\MageBdd\Skeleton\SkeletonClass
 */
class MageBddFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mage-bdd';
    }
}
