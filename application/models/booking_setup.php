<?php

class Booking_Setup extends MY_Model {
    
    const DB_TABLE = 'restaurant_booking';
    const DB_TABLE_PK = 'res_booking_id';
    public $res_booking_id;
    public $person_name;
    public $contact_number;
	public $address;
    public $booking_place;
    public $total_person;
	public $per_person_amount;
	public $programme_name;
    public $total_amount_main;
    public $total_money;
	public $service_charge;
	public $total_paid;
	public $advance;
	public $due;
	public $hall_rent;
	public $discount_amount;
	public $booking_date;
	public $booking_time;
	public $comment;
	public $DOC;
	public $DOM;
	public $creator;
	public $transaction_status;
	
}
?>