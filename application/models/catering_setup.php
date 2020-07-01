<?php

class Catering_Setup extends MY_Model {
    
    const DB_TABLE = 'catering_info';
    const DB_TABLE_PK = 'catering_id';
    public $catering_id;
    public $item_name;
    public $stock_amount;
    public $store_name;
	public $unit_buy_price;
    public $current_use_amount;
	public $damage_lost;
    public $catering_doc;
	public $catering_dom;	
    public $creator;
}
?>