<?php

class Table_Setup extends MY_Model {
    
    const DB_TABLE = 'table_info';
    const DB_TABLE_PK = 'table_id';
	const DB_TABLE_ORDER_BY = 'table_number';
    public $table_id;
    public $table_name;
    public $table_number;
    public $capacity;
	public $active;
	public $border_radius;
	public $font_color;
	public $back_color;
	public $border_width;
	public $border_color;
	
	public $xaxis_one;
	public $yaxis_one;
	public $xaxis_two;
	public $yaxis_two;
	
    public $status;
    public $doc;
	public $dom;
    public $creator;
}
?>