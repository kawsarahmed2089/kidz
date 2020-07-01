<?php

class Country_Setup extends MY_Model {
    
    const DB_TABLE = 'country_info';
    const DB_TABLE_PK = 'country_id';
    public $country_id;
    public $country_name;
    public $country_code;
}

?>
