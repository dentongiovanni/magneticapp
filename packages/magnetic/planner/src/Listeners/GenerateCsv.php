<?php

namespace Magnetic\Planner\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Magnetic\Planner\Models\Company;
use Magnetic\Planner\Models\Employee;
class GenerateCsv
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

         $employees =  Employee::with('company')->get();
         $columns = array('Employee Name', 'Employee ID', 'Company Name', 'Company ID', 'Created');
         $file = fopen('file.csv', 'w');
         fputcsv($file, $columns);
         foreach($employees as $employee){
           fputcsv($file, array($employee->name, $employee->id, $employee->company->name, $employee->company->id, $employee->created_at));
         }
          fclose($file);
  
    }
}
