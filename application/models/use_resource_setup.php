<?php

class Use_Resource_Setup extends MY_Model {
    
    const DB_TABLE = 'usage_resource_info';
    const DB_TABLE_PK = 'usage_infoID';
    public $usage_infoID;
    public $product_id;
    public $category;
    public $amount;
	public $description;
    public $creator;
	public $doc;
	public $dom;

}
?>