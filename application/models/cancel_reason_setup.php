<?php

class Cancel_Reason_Setup extends MY_Model {
    
    const DB_TABLE = 'order_cancel_reason';
    const DB_TABLE_PK = 'reason_id';
    public $reason_id;
    public $cancel_reason;
    public $doc;
    public $creator;
}
?>