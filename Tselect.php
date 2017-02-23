<?php 
 $conn = mysqli_connect("localhost", "root", "root", "museum"); 
 $output = ''; 
 $sql = "SELECT * FROM content ORDER BY id DESC"; 
 $result = mysqli_query($conn, $sql); 
 $output .= ' 
 <div align="center"> 
 <table border="1" bordercolor="#000000"> 
 <tr> 
 <th width="5%">Id</th> 
 <th width="5%">Content No.</th>
 <th width="20%">Category</th> 
 <th width="20%">Topic</th> 
 <th width="40%">Content</th> 
 <th width="10%">Delete</th> 
 </tr>'; 
 if(mysqli_num_rows($result) > 0) 
 { 
	 while($row = mysqli_fetch_array($result)) 
	 { 
		 $output .= ' 
		 <tr> 
		 <td>'.$row["id"].'</td> 
		 <td class="contentNumber" data-id1="'.$row["id"].'" contenteditable>'.$row["contentNumber"].'</td> 
		 <td class="category" data-id2="'.$row["id"].'" contenteditable>'.$row["category"].'</td> 
		 <td class="topic" data-id3="'.$row["id"].'" contenteditable>'.$row["topic"].'</td> 
		 <td class="content" data-id4="'.$row["id"].'" contenteditable>'.$row["content"].'</td> 
		 <td><button type="button" name="delete_btn" data-id5="'.$row["id"].'" id="delete">Delete</button></td> 
		 </tr> 
		 '; 
	 } 


	 $output .= ' 
	 <tr> 
	 <td></td> 
	 <td id="contentNumber" contenteditable></td> 
	 <td id="category" contenteditable></td> 
	 <td id="topic" contenteditable></td> 
	 <td id="content" contenteditable></td> 
	 <td><button type="button" name="add" id="add">Add</button></td> 
	 </tr> 
	 '; 
 } 
 else 
 { 
	 $output .= '<tr> 
	 <td colspan="4">Data not Found</td> 
	 </tr>'; 
 } 
 $output .= '</table> 
 </div>'; 
 echo $output; 
 ?>