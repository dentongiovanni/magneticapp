<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('companies')->insert([
          						[
            						'name' => 'Company 1',
	        					],
	        					[
	            					'name' => 'Company 2',
	        					]
	        				]
	        );


           DB::table('employees')->insert([
          						[
            						'name' => 'Employee 1',
            						'company_id' => 1,
            					],
            					[
            						'name' => 'Employee 2',
            						'company_id' => 1,
            					],
            					[
            						'name' => 'Employee 3',
            						'company_id' => 1,
            					],

            					[
            						'name' => 'Employee 4',
            						'company_id' => 2,
            					],
            					[
            						'name' => 'Employee 5',
            						'company_id' => 2,
            					],
            					[
            						'name' => 'Employee 6',
            						'company_id' => 2,
            					],
	        				
	        				]
	        );
    }
}
