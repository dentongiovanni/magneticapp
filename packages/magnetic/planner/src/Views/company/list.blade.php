@extends('layouts.app')

@section('content')
	<div class="container">
		

		<div class="row invisible" id="download_div">
			 <div class="col-lg-6">
					<p class="float-right">CSV File ready to download</p>	
			</div>
 		    <div class="col-lg-6">
					<button type="button" id="download_csv" class="btn  btn-danger float-right">Download</button>	
			</div>			
		</div>
	 		<div class="row mt-5">
 		    <div class="col-lg-12">
				<button type="button" id="export_csv" class="btn btn-success float-right">Export to CSV</button>	
			</div>			
		</div>
		<input type="hidden" id="email" value="{{ $user_email }}">
		<div class="row mt-5">
		<table class="table bordered">
		   <thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Number of Employees</th>
				<th>Created</th>
			</tr>
			</thead>
			<tbody>
				@foreach($results as $result)
				 <tr>
					<td>{{ $result->id }}</td>	
					<td>{{ $result->name }}</td>	
					<td>{{ count($result->employees) }}</td>	
					<td>{{ $result->created }}</td>	
				 </tr>
				@endforeach	
			</tbody>
		</table>
		</div>
	</div>

<script>

    var xhr= "";
    $(document).delegate("#export_csv","click",function(){
   		
        xhr && xhr.abort;
         xhr = $.ajax({
            url:"/api/company-generate-csv",
            type:"POST",
            data:{email:$("#email").val()}
            success:function(response){
                $( "#download_div" ).removeClass("invisible");
                $( "#download_div" ).addClass("visible");
            }
         });    
    });



    $(document).delegate("#download_csv","click",function(){
         var win = window.open('file.csv', '_blank');
             win.focus();
    });
</script>

@endsection
