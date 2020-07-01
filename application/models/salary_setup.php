<?php

class Salary_Setup extends MY_Model {
    
    const DB_TABLE = 'employee_salary_log';
    const DB_TABLE_PK = 'salary_log_id';
    public $salary_log_id;
    public $user_id;
    public $salary_amount;
    public $extra_payment;
	public $reduced_amount;
	public $salary_month;
	public $salary_year;
    public $mode;
	public $account_table_ref_id;
    public $salary_doc;
	public $salary_dom;	
    public $salary_creator;
	public $salary_status;
}
?>