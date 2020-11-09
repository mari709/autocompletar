

<!doctype html>
<head>
	<title>Autocomplete</title>
	<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
	<script type="text/javascript" src="js/jquery-ui.js"></script>
</head>
<body>
<p>AUTOCOMPLETAR INPUT</p>
	<label for ="nombre">Nombre</label>
	<input type="text" id="nombre">

	<script type="text/javascript">
		$(document).ready(function () {

            $('#nombre').autocomplete({
				source: function(request, response){

					$.ajax({
						url:"nombres.php",
						dataType: "json",
						data:{q:request.term},
						success: function(data){
						       response(data);
					}
				});
			},
			minLenght:1,
			select: function(event,ui){
				alert("Selecciono :"+ ui.item.label);
			}


		});

		});
	</script>

</body>
</html>
