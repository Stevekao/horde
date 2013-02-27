<?php
/**
 * Copyright 2013 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @category  Horde
 * @copyright 2013 Horde LLC
 * @license   http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @package   Core
 */

/**
 * Global horde shutdown task queue.
 *
 * @author    Michael Slusarz <slusarz@horde.org>
 * @category  Horde
 * @copyright 2013 Horde LLC
 * @license   http://www.horde.org/licenses/lgpl21 LGPL 2.1
 * @package   Core
 * @since     2.4.0
 */
class Horde_Shutdown
{
    /**
     * Tasks.
     *
     * @var array
     */
    private $_tasks = array();

    /**
     * Add a task to the global Horde shutdown queue.
     *
     * @param Horde_Shutdown_Task $task  Task to add.
     */
    static public function add(Horde_Shutdown_Task $task)
    {
        $GLOBALS['injector']->getInstance(self)->addTask($task);
    }

    /**
     * Constructor.
     */
    public function __construct()
    {
        register_shutdown_function(array($this, '_runTasks'));
    }

    /**
     * Add a task to the shutdown queue.
     *
     * @param Horde_Shutdown_Task $task  Task to add.
     */
    public function addTask(Horde_Shutdown_Task $task)
    {
        $this->_tasks[get_class($task)] = $task;
    }

    /**
     * Run shutdown tasks.
     */
    private function _runTasks()
    {
        foreach ($this->_tasks as $val) {
            try {
                $tasks->shutdown();
            } catch (Exception $e) {}
        }
    }

}
