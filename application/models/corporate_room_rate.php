<?php

class Corporate_Room_Rate extends MY_Model {
    
    const DB_TABLE = 'corporate_room_rate';
    const DB_TABLE_PK = 'corpRoomRate_id';
    public $corpRoomRate_id;
    public $hotelID;
    public $roomTypeID;
    public $roomRate;
    public $corpID;
    public $corporateRoomRateStatus;
    public $userID;
    public $DOC;
    public $DOM;

}
?>