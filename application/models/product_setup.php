<?php

class Product_Setup extends MY_Model {
    
    const DB_TABLE = 'product_info';
    const DB_TABLE_PK = 'product_id';
    public $product_id;
    public $product_name;
    public $sale_price;
    public $cost_price;
	public $category;
	public $product_code;
	public $stock_amount;
	public $unit_name;
    public $show_in_kitchen;
	public $service_insert_id;
	public $package_definition;
    public $DOC;
	public $DOM;
    public $creator;
}
?>