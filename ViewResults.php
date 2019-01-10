<div class="viewstudentsvotesresults">
<?php
include("databaseconnect.php"); 
$selpost = "SELECT * FROM `candidates`  ORDER BY `Position` ASC ";
$querypost = mysqli_query($connect, $selpost);

/*$selpost = "SELECT * FROM `votes` WHERE `candidate_id` = '$candidate_id'";
$querypost = mysqli_query($connect, $selpost);
while($rowpost = mysqli_fetch_array($querypost)){
	$Position = $rowpost['Position'];
	
	
}
*/


while($rowpost = mysqli_fetch_array($querypost)){
	$candidate_id = $rowpost['candidate_id'];
	$first_name = $rowpost['first_name'];
	$last_name = $rowpost['last_name'];
	
					$selpost = "SELECT * FROM `votes` WHERE `candidate_id` = '$candidate_id' ";
					$querycand = mysqli_query($connect, $selpost);					
									$rowcand = mysqli_fetch_assoc($querycand);
									$Position = $rowcand['Position'];
									
									
											$results = "SELECT count(votesnumber) as votesresults FROM `votes` WHERE `candidate_id`  = '$candidate_id' ";
											$queryresults = mysqli_query($connect, $results);
											if($queryresults) {
											while($rowresults = mysqli_fetch_assoc($queryresults)){
											$res = $rowresults['votesresults'];

											}
											}	else {

											echo "error";

											}
									echo '<div id="resultsperperson">
									<div id="resultsperpersonhead">'.
									$first_name.' '. $last_name
									.'</div>
									<div id="resultsperpersoncotent">
									'.$res.'
									</div>
									<div id="resultsperpersonfooter">
									'.$Position.'
									</div>
									</div>';
									
	
}


$selpost = "SELECT * FROM `votes` WHERE `candidate_id` = '$candidate_id'";
$querypost = mysqli_query($connect, $selpost);
while($rowpost = mysqli_fetch_array($querypost)){
	$Position = $rowpost['Position'];
	
	
}

?>

<?php 
 		include("databaseconnect.php"); 
		/*$sqlQuery = "SELECT * FROM `votes`";
		$qryCandidate = mysqli_query($connect, $sqlQuery);
		/*$first_name= "";
		$last_name= "";
		$position= "";
		$votescasted= "";

		$sqlQuery = "SELECT sum( `votesnumber` ) FROM `votes` WHERE `candidate_id` = '$candidate_id'";
		$qryCandidate = mysqli_query($connect, $sqlQuery);


		while($getcandidateid = mysqli_fetch_array($qryCandidate)){
             $getcandidateidresult = $getcandidateid['votesnumber'];
		}
*/
		$sqlQuery = "SELECT * FROM `votes` ";
		$qryCandidate = mysqli_query($connect, $sqlQuery);
		while($resultsqry=mysqli_fetch_array($qryCandidate)){
			$Position = $resultsqry['Position'];
			$candidate_id = $resultsqry['candidate_id'];
			$votescasted = $resultsqry['votesnumber'];
           
       // echo "<ul><li>$first_name</li></ul>";

            echo "<table >

			<tr>
	        	<td> $Position </td><td>$candidate_id </td><td>$votescasted </td>
	        </tr>

	        <tr>
	        	
	        </tr>

	       
	        </table>";

		}

?>

			<!--

<table class="resultsTable">

			<tr>
	        	<th><?php echo $position; ?> </th>
	        </tr>

	        <tr>
	        	<th><?php echo $first_name; ?> </th>
	        </tr>

	        <tr>
	        	<th><?php echo $last_name; ?> </th>
	        </tr>
	        <tr>
	        	<th><?php echo $votescasted; ?> </th>
	        </tr>



	        </table>


			<table class="resultsTable">

			<tr>
	        	<th><?php echo $position; ?> </th>
	        </tr>

	        <td><?php echo $first_name; ?></td>  
	        <td><?php echo $last_name; ?></td> 
	        <td><?php echo $votescasted; ?> </td>
	        </table>
-->
</div>
