<?php

class Stuff_Setup extends MY_Model {
    
    const DB_TABLE = 'stuff_info';
    const DB_TABLE_PK = 'stuff_id';
    public $stuff_id;
    public $stuff_name;
    public $contact;
	public $address;
    public $resignation;
    public $DOC;
    public $creator;
}
?>