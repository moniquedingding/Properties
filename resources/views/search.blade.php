<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>Property Search</title>
        <style>
        </style>
    </head>
    <body>
        <div class="container">
        	<div class="starter-template">
		        <h1>Property Search</h1>
		        <p class="lead"> Our huge selection of accommodations will let you plan the perfect trip.<br/>
		        From adventure travel and backpacking to honeymoons and family vacations, we've got you covered.</p>
		    </div>

            <form method="POST">
                <div class="form-group"> 
	                <div class="form-group col-md-12">
                    	<label for="name">Name</label>
                    	<input id="name" name="name" type="text" class="form-control"/>
                	</div>
                </div>
                <div class="form-group">
	                <div class="form-group col-md-12">
    		            <label>Price</label>
                    </div>
                    <div class="form-group col-md-6">
                    <input id="minPrice" name="minPrice" type="text" class="form-control " placeholder="Staring price" />
                    </div>
                    <div class="form-group col-md-6">
                    <input id="maxPrice" name="maxPrice" type="text" class="form-control" placeholder="Last price" />
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="bed">Bedrooms</label>
                    <input id="bedrooms" name="bed" type="text" class="form-control"/>
                </div>
                <div class="form-group col-md-3">
                    <label for="bath">Bathroom</label>
                    <input id="bathrooms" name="bath" type="text" class="form-control"/>
                </div>
                <div class="form-group col-md-3">
                    <label for="storey">Storeys</label>
                    <input id="storeys" name="storey" type="text" class="form-control"/>
                </div>
                <div class="form-group col-md-3">
                    <label for="garage">Garage</label>
                    <input id="garages" name="garages" type="text" class="form-control"/>
                </div>

                <div class="form-group col-md-12 text-center">
                	<button id="submitBtn" type="button" class="btn btn-primary btn-block">Submit</button>
            	</div> 
            </form> 
        </div>
        <div class="container">
        	<hr/>
        	<h4>Search Results</h4>
					<table id="propsTable" class="table table-bordered">
						<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Price</th>
							<th>Bedrooms</th>
							<th>Bathrooms</th>
							<th>Storeys</th>
							<th>Garages</th>
						</tr>
						</thead>
						<tbody id="propsList">
							<tr id="emptyRow">
								<td colspan="7" class="text-center">No results to display.</td>
							</tr>
							<tr id="loadingRow">
								<td colspan="7" class="text-center"><i class="fa fa-spinner fa-spin"></i></td>
							</tr>
						</tbody>
					</table>
        </div>
    </body>

    <script type="text/javascript"> 
    	$('#loadingRow').hide()

	    $("#submitBtn").click(function(e) {
	    	let postData = {
	    		name: $("#name").val(),
	    		bedrooms: $("#bedrooms").val(),
	    		bathrooms: $("#bathrooms").val(),
	    		garages: $("#garages").val(),
	    		storeys: $("#storeys").val(),
	    		minPrice: $("#minPrice").val(),
	    		minPrice: $("#minPrice").val(),
	    		maxPrice: $("#maxPrice").val(),
	    	}

	    	$.ajax({
					url: 'api/search',
					data: postData,
					dataType: 'json',
					method: 'POST',

					beforeSend: function () {
						$("#emptyRow").hide()  
		        $('#loadingRow').show()
			    },
			    complete: function () {
		        $('#loadingRow').hide()
			    },
					success: function (response) {
						showTableResults(response.data)             
					}
				})
	    })

	    function showTableResults (data) {
	    	var row = ''

	    	if (data.length === 0) {
	    		$("#emptyRow").show()   
	    	} else {

		    	$("#emptyRow").hide()   
		    	$("#propsList").html("")

		    	$.each(data, function(i, item) {

		    		row = '<tr>'
		    		row += '<th>' + (i+1) + '</th>'
		    		row += '<td>' + item.name + '</td>'
		    		row += '<td>' + item.price + '</td>'
		    		row += '<td>' + item.bedrooms + '</td>'
		    		row += '<td>' + item.bathrooms + '</td>'
		    		row += '<td>' + item.storeys + '</td>'
		    		row += '<td>' + item.garages + '</td>'
		    		row += '</tr>'

	          $("#propsList").append(row)
	        })
	    	}
	    }
    </script>
</html>
