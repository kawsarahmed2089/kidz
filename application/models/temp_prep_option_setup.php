<?php

class Temp_Prep_Option_Setup extends MY_Model {
    
    const DB_TABLE = 'temp_preparation_option';
    const DB_TABLE_PK = 'temp_prep_option_id';
    public $temp_prep_option_id;
    public $product_id;
	public $order_id;
	public $pre_option_id;
    public $doc;
	public $dom;
    public $creator;
}
?>