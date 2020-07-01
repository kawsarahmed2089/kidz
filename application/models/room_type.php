<?php

class Room_Type extends MY_Model {
    
    const DB_TABLE = 'room_type';
    const DB_TABLE_PK = 'roomTypeID';
    public $roomTypeID;
    public $hotelID;
    public $roomTypeName;
    public $roomTypeBasicDescription;
    public $userID;
    public $DOC;
    public $DOM;
    public $min_adults;
    public $min_child;
    public $max_adults;
    public $max_child;
}
?>