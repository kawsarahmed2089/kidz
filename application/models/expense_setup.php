<?php

class Expense_Setup extends MY_Model {
    
    const DB_TABLE = 'restaurant_expense';
    const DB_TABLE_PK = 'restaurant_expense_id';
    public $restaurant_expense_id;
    public $providerName;
    public $purpose;
	public $amount;
    public $comment;
    public $doc;
	public $dom;
    public $creator;
}
?>