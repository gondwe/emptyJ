<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                
                <div class="col-md-12">
   <div class="row" style="margin-top:20px;">
      <div class="col-md-1"></div>  
       
    <div class="col-md-9 card">

	<?php 
	
	$id = $_REQUEST["id"];
	$data = getlist("select * from truck_request where id ='$id'");
	$ownerid = $data["fleet_owner_id"];
	$truck = $data["truck_id"];
	
	$from = getlist("select tr.*, tu.tel from truck_owner as tr left join truck_users as tu on tu.id = tr.user_id where tr.user_id = '$ownerid'");
	$truck = getlist("select * from truck where id = '$truck'");
	
		
	echo "<h3 style='margin-top:10px;'>Fleet Managers Details</h3>";
	//spill($from);
	echo "<table class='table'>";
    	echo "<tr>";
	    	echo "<th>";
    	    echo "Photo";
    	echo "</th>";
    	echo "<th>";
    	    echo "Full Name";
    	echo "</th>";
    	echo "<th>";
    	    echo "ID Number";
    	echo "</th>";
    	echo "<th>";
    	    echo "Address";
    	echo "</th>";
    	echo "<th>";
    	    echo "Email";
    	echo "</th>";

    	echo "<th>";
    	    echo "Date";
    	echo "</th>";
    	echo "<th>";
    	    echo "Phone";
    	echo "</th>";    		
    echo "</tr>";
	echo "</tr>";
	echo "<td>".$from["photo"]."</td>";
	echo "<td>".$from["full_name"]."</td>";
	echo "<td>".$from["regno"]."</td>";
	echo "<td>".$from["address"]."</td>";
	echo "<td>".$from["email"]."</td>";
	echo "<td>".$from["date"]."</td>";
	echo "<td>".$from["tel"]."</td>";
	echo "</table>";
	
	
	//spill($truck);
	echo "<h3>Truck Details </h3>";
	echo "<table class='table'>";
	  
	
		echo "<tr>";
	    	echo "<th>";
    	    echo "Photo";
    	echo "</th>";
    	echo "<th>";
    	    echo "Number Plate";
    	echo "</th>";
    	echo "<th>";
    	    echo "Truck Name";
    	echo "</th>";
    	echo "<th>";
    	    echo "Type";
    	echo "</th>";
    	echo "<th>";
    	    echo "Capatity";
    	echo "</th>";

    	echo "<th>";
    	    echo "Model";
    	echo "</th>";
    	  		
    echo "</tr>";
    
    
	echo "<td>".$truck["photo"]."</td>";
	echo "<td>".$truck["number_plate"]."</td>";
	echo "<td>".$truck["name"]."</td>";
	echo "<td>".$truck["type"]."</td>";
	echo "<td>".$truck["capacity"]."</td>";
	echo "<td>".$truck["model"]."</td>";
	
	
	
	echo "</table>";
	
	
	
	?>
</div>
</div>
</div>
</div>




<?php include 'footer.php' ?>

