<?php

class Product_Category_Setup extends MY_Model {
    
    const DB_TABLE = 'product_category';
    const DB_TABLE_PK = 'category_id';
    public $category_id;
    public $category_name;
    public $category_discr;
    public $back_color;
    public $font_color;
	public $resource_category;
    public $doc;
    public $creator;
}
?>