<?php

Route::prefix('api')->group(function () {

	 Route::group(['namespace' => 'Magnetic\Planner\Controllers','middleware' => ['api','auth']], function()
	 {
				Route::resource("company","CompanyController");
				Route::post("company-generate-csv","CompanyController@generateCSV");
				Route::resource("employee","EmployeeController");
	 });
});