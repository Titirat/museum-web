<!doctype html>
<html >
<head> 
	 <title>Live Table Data Edit</title> 
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

</head> 
	 <body> 
	 <div class="container"> 
	 <h1 align="center">Content</h1><br /> 
	 <div id="disp_data"></div> 
	 </div> 

	 </body> 
</html>

<script> 
 $(document).ready(function(){ 
	 function fetch_data() 
	 { 
		 $.ajax({ 
			 url:"Tselect.php", 
			 method:"POST", 
			 success:function(data)
			 { 
			 	$('#disp_data').html(data); 
			 } 
		 }); 
	 } 
	 fetch_data(); 
	 $(document).on('click', '#add', function(){ 
	 	 var contentNumber = $('#contentNumber').text(); 
		 var category = $('#category').text(); 
		 var topic = $('#topic').text(); 
		 var content = $('#content').text(); 

		 if(contentNumber == '') 
		 { 
		 	alert("Enter content number"); 
		 	return false; 
		 } 
		 if(category == '') 
		 { 
		 	alert("Enter category"); 
		 	return false; 
		 } 
		 if(topic == '') 
		 { 
		 	alert("Enter topic"); 
		 	return false; 
		 } 
		 if(content == '') 
		 { 
		 	alert("Enter content"); 
		 	return false; 
		 } 
		 $.ajax({ 
			url:"Tinsert.php", 
			method:"POST", 
			data:{contentNumber:contentNumber, category:category, topic:topic, content:content}, 
			dataType:"text", 
		 	success:function(data) 
		 	{ 
		 		alert(data); 
		 		fetch_data(); 
		 	} 
		 }) 
	 }); 

	function edit_data(id, text, column_name) 
	{ 
	 	$.ajax({ 
			url:"Tedit.php", 
			method:"POST", 
			data:{id:id, text:text, column_name:column_name}, 
			dataType:"text", 
			success:function(data)
			{ 
				alert(data); 
			} 
		}); 
	} 

	 $(document).on('blur', '.contentNumber', function(){ 
		 var id = $(this).data("id1"); 
		 var contentNumber = $(this).text(); 
		 edit_data(id, contentNumber, "contentNumber"); 
	 });

	 $(document).on('blur', '.category', function(){ 
		 var id = $(this).data("id2"); 
		 var category = $(this).text(); 
		 edit_data(id, category, "category"); 
	 }); 

	 $(document).on('blur', '.topic', function(){ 
		 var id = $(this).data("id3"); 
		 var topic = $(this).text(); 
		 edit_data(id,topic, "topic"); 
	 }); 

	 $(document).on('blur', '.content', function(){ 
		 var id = $(this).data("id4"); 
		 var content = $(this).text(); 
		 edit_data(id,content, "content"); 
	 }); 


	 $(document).on('click', '#delete', function(){ 
		 var id=$(this).data("id5"); 
		 if(confirm("Are you sure you want to delete this?")) 
		 { 
		 	$.ajax({ 
		 		url:"Tdelete.php", 
		 		method:"POST", 
		 		data:{id:id}, 
		 		dataType:"text", 
		 		success:function(data)
		 		{ 
		 			alert(data); 
		 			fetch_data(); 
	 			} 
 			}); 
	 	} 
	 }); 
}); 
 </script>