<?php include 'head.php' ?> 
<?php include 'nav.php' ?>


<style>
.message-box {
	border-bottom: 1px solid rgba(120,130,140,0.13);
	display: block;
	text-decoration: none;
	padding: 9px 15px;
}
</style>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
            <h3 style="margin-top:20px;">Messages</h3>
<?php 
$me =  $_SESSION[$ndk]["inside"]["id"];
$m = get("select id, subject, message, date from truck_inbox where msgfrom ='$me' or msgto = '$me' order by date desc");

// spill($m);

foreach($m as $ms=>$gs){
    echo '<div class="card message" style="padding: 9px 15px; border-bottom: 1px solid rgba(120,130,140,0.13);">';
    echo "<h5>".$gs["subject"]."</h5><br>";
    echo $gs["message"]."<br>";
    echo "<small>Date: ".$gs["date"]."</small>";
    echo "</hr>";
    echo '</div>';
}
?>
                
                
                

</div>
</div>

<?php include 'footer.php' ?>
