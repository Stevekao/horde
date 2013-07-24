<?php
class HordeHistoryRemoveCompositeIndex extends Horde_Db_Migration_Base
{
    public function up()
    {
        $this->removeIndex('horde_histories', 'history_modseq');
        $this->removeIndex('horde_histories', 'object_uid');
    }

    public function down()
    {
        $this->addIndex('horde_histories', array('history_modseq', 'object_uid'));
    }

}
