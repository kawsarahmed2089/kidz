<?php

class Order_Setup extends MY_Model {
    
    const DB_TABLE = 'order_info';
    const DB_TABLE_PK = 'order_id';
    public $order_id;
    public $table_id;
	public $client_id;
    public $client_name;
	public $contact_number;
    public $guest_quantity;
	public $waiter;
    public $comments;
	public $status;
	public $order_type;
	public $order_place;
	public $room_number;
	public $total_amount;
	public $discount_amount;
	public $service_charge;
	public $running;
    public $doc;
	public $dom;
    public $creator;
}
?>