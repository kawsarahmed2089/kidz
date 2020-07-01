<?php

class Customer_Info extends MY_Model {
    
    const DB_TABLE = 'customer_info';
    const DB_TABLE_PK = 'customerID';
    
    public $customerID;
    public $hotelID;
    public $corpID;
    public $firstName;
    public $lastName;
    public $fatherName;
    public $motherName;
    public $dob;
    public $contactNo;
	public $emailAddress;
	public $presentAddress;
    public $parmannentAddress;
    public $nationality;
    public $countryCode;
    public $nID;
    public $passportNo;
    public $DOC;
    public $DOM;

}
?>