<?php

class Corporate_Setup extends MY_Model {
    
    const DB_TABLE = 'corporate_setup';
    const DB_TABLE_PK = 'corpID';
    public $corpID;
    public $hotelID;
    public $corpName;
    public $corpAddress;
    public $corpContactNo;
    public $userID;
    public $corpContactPerson;
    public $corpEmailAddress;
	public $Bank;
	public $corpWeb;
    public $DOC;
    public $DOM;

}
?>