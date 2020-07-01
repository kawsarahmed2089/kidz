<?php

class Catering_Log_Setup extends MY_Model {
    
    const DB_TABLE = 'catering_log';
    const DB_TABLE_PK = 'catering_log_id';
    public $catering_log_id;
    public $item_id;
    public $purpose;
    public $provider_name;
	public $quantity;
	public $description;
    public $doc;
	public $dom;	
    public $creator;
}
?>