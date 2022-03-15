<?php

namespace Picqer\Carriers\SendCloud;

/**
 * Class Tracking
 *
 * @package Picqer\Carriers\SendCloud
 */
class Tracking extends Model
{
    use Query\FindOne;

    protected $fillable = [
        //
    ];

    protected $url = 'tracking';

    protected $namespaces = [
        'singular' => 'tracking',
        'plural' => 'trackings'
    ];
}
