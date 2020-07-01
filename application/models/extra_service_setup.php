<?php

class Extra_Service_Setup extends MY_Model {
    
    const DB_TABLE = 'additional_service';
    const DB_TABLE_PK = 'addServiceID';
    public $addServiceID;
    public $hotelID;
    public $addServiceName;
    public $addServiceCharge;
	public $addServiceNote;
    public $addServiceStatus;
	public $userID;
	public $DOC;
	public $DOM;

}
?>