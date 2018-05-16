<?php
namespace Messerli90\FirstPromoter\Facades;

use Illuminate\Support\Facades\Facade;

class FirstPromoter extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'first_promoter'; }
}
