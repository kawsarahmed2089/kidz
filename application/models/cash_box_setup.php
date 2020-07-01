<?php

class Cash_Box_Setup extends MY_Model {
    
    const DB_TABLE = 'cashbox_info';
    const DB_TABLE_PK = 'cashbox_id';
    public $cashbox_id;
    public $opening_cashbox;
	public $thousand;
	public $five_hundred;
	public $one_hundred;
	public $fifty;
	public $twenty;
	public $ten;
	public $five;
	public $two;
	public $not_edit_future;
	public $one;
    public $DOC;
	public $DOM;
    public $creator;
}
?>