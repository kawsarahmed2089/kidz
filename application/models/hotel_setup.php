<?php

class Hotel_Setup extends MY_Model {
    
    const DB_TABLE = 'hotel_setup';
    const DB_TABLE_PK = 'hotel_id';
    public $hotel_id;
    public $hotel_name;
    public $hotel_grade;
    public $hotel_address;
    public $hotel_contact;
    public $hotel_doc;

}
?>