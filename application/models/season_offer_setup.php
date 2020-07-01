<?php

class Season_Offer_Setup extends MY_Model {
    
    const DB_TABLE = 'season_offer_setup';
    const DB_TABLE_PK = 'seasonOfferID';
    public $seasonOfferID;
    public $hotelID;
    public $seasonOfferName;
    public $roomRateDiscountPercent;
    public $startDate;
    public $endDate;
    public $seasonOfferStatus;
    public $userID;
    public $DOC;
    public $DOM;
    
}
