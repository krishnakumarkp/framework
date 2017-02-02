<?php
/**
 * Events - all Module's specific Events are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 4.0
 */


/** Define Events. */

// Add a Listener Class to the Event 'test'.
Event::listen('test', 'Demos\Events\Test@handle');

// Add a Listener Closure to the Event 'test'.
Event::listen('test', function($data)
{
    return '<pre>Closure : ' .var_export($data, true) .'</pre>';
});
