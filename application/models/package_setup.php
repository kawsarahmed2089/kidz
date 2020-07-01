<?php

class Package_Setup extends MY_Model {
    
    const DB_TABLE = 'package_info';
    const DB_TABLE_PK = 'package_info_id';
    public $package_info_id;
    public $package_id;
    public $product_id;
    public $quantity;
    public $doc;
	public $dom;
    public $creator;
}
?>