<?php

class Order_Details_Setup extends MY_Model {
    
    const DB_TABLE = 'order_details';
    const DB_TABLE_PK = 'order_details_id';
    public $order_details_id;
    public $product_id;
    public $order_id;
	public $sale_prices;
    public $quantity;
	public $guest_number;
	public $prep_comment;
	public $service_in_room_id;
    public $doc;
	public $dom;
    public $creator;
}
?>