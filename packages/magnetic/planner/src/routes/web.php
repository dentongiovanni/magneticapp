<?php


 Route::group(['namespace' => 'Magnetic\Planner\Controllers','middleware' => ['web']], function()
 {
			Route::get("company-list","CompanyController@companyList");
			//Route::resource("employee","EmployeeController");
 });