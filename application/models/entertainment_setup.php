<?php

class Entertainment_Setup extends MY_Model {
    
    const DB_TABLE = 'entertainment_info';
    const DB_TABLE_PK = 'entertainment_id';
    public $entertainment_id;
    public $honor_name;
    public $contact;
	public $address;
    public $resignation;
    public $DOC;
    public $creator;
}
?>