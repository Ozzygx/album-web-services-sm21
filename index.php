<html>
<head>
<title>Bond Web Service Demo!</title>
<style>
body {font-family:georgia;}
</style>
<script src="https://code.jquery.com/jquery-latest.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {  

	$('.category').click(function(e){
        e.preventDefault(); //stop default action of the link
		cat = $(this).attr("href");  //get category from URL
		loadAJAX(cat);  //load AJAX and parse JSON file
	});
});	


function loadAJAX(cat)
{
	//AJAX connection will go here
    //alert('cat is: ' + cat);

	$.ajax({
		type:"GET",
		dataType: "json",
		url: "api.php?cat=" + cat,
		success:bondJSON
	});


}
    
function toConsole(data)
{//return data to console for JSON examination
	console.log(data); //to view,use Chrome console, ctrl + shift + j
}

function bondJSON(data){
//JSON processing data goes here

	//using this I can see the obj in the console.
	console.log(data);

	//In this way we can see all of the data on the page
	let myData = JSON.stringify(data,null,4);
	myData = '<pre>' + myData + '</pre>';
	$("#output").html(myData);

	//this works but the text is all bunched up
	//$("#output").text(JSON.stringify(data));
	
}

</script>
</head>
	<body>
	<h1>Bond Web Service</h1>
		<a href="year" class="category">Bond Films By Year</a><br />
		<a href="box" class="category">Bond Films By International Box Office Totals</a>
		<h3 id="filmtitle">Title Will Go Here</h3>
		<div id="films">
			<p>Films will go here</p>
		</div>
		<div id="output">Results go here</div>
	</body>
</html>
