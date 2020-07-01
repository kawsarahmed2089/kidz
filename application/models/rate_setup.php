<?php

class Rate_Setup extends MY_Model {
    
    const DB_TABLE = 'room_rate';
    const DB_TABLE_PK = 'roomRateID';
    public $roomRateID;
    public $hotelID;
    public $roomTypeID;
    public $roomRate;
	public $userID;
    public $roomRateStatus;
	public $DOC;
	public $DOM;

}
?>