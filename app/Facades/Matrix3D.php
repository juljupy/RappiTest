<?php
/**
 * 
 * Facade that exposes matrix3d
 * 
 * 
 */
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Matrix3D extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'matrix3d'; }
}