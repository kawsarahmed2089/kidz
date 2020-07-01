<?php

class Prep_Option_Setup extends MY_Model {
    
    const DB_TABLE = 'prep_options';
    const DB_TABLE_PK = 'prep_options_id';
    public $prep_options_id;
    public $option_name;
    public $doc;
	public $dom;
    public $creator;
}
?>