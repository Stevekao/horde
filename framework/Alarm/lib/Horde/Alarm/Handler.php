<?php
/**
 * @package Horde_Alarm
 *
 * Copyright 2010 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 */

/**
 * The Horde_Alarm_Handler class is an interface for all Horde_Alarm handlers
 * that notifies of active alarms.
 *
 * @author  Jan Schneider <jan@horde.org>
 * @package Horde_Alarm
 */
abstract class Horde_Alarm_Handler
{
    /**
     * The alarm object to that this handler is attached.
     *
     * Horde_Alarm
     */
    public $alarm;

    /**
     * Constructor.
     *
     * @param array $params  Any parameters that the handler might need.
     */
    abstract public function __construct(array $params = null);

    /**
     * Notifies about an alarm.
     *
     * @param array $alarm  An alarm hash.
     */
    abstract public function notify(array $alarm);

    /**
     * Returns a human readable description of the handler.
     *
     * @return string
     */
    abstract public function getDescription();

    /**
     * Returns a hash of user-configurable parameters for the handler.
     *
     * The parameters are hashes with parameter names as keys and parameter
     * information as values. The parameter information is a hash with the
     * following keys:
     * - type: the parameter type as a preference type.
     * - desc: a parameter description.
     * - required: whether this parameter is required.
     *
     * @return array
     */
    public function getParameters()
    {
        return array();
    }
}
