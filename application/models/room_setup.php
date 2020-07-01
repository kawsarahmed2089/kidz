<?php

class Room_Setup extends MY_Model {
    
    const DB_TABLE = 'room_setup';
    const DB_TABLE_PK = 'roomID';
    public $roomID;
    public $hotelID;
    public $floorID;
    public $roomCode;
    public $roomStatus;
    public $userID;
    public $roomName;
    public $roomType;
    public $DOC;
    public $DOM;

}