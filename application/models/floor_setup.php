<?php

class Floor_Setup extends MY_Model {
    
    const DB_TABLE = 'floor_setup';
    const DB_TABLE_PK = 'floorID';
    public $floorID;
    public $hotelID;
    public $floorName;
    public $floorCode;
    public $userID;

}
?>