<?php include 'head.php' ?> 
<?php include 'nav.php' ?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
            
            <h3>Messages</h3>
<?php 
$me =  $_SESSION[$ndk]["inside"]["id"];
$m = get("select id, subject, message, date from truck_inbox where msgfrom ='$me' or msgto = '$me' order by date desc");

// spill($m);

foreach($m as $ms=>$gs){
    echo "<strong>".$gs["subject"]."</strong><br>";
    echo $gs["message"]."<br>";
    echo "<small>Date: ".$gs["date"]."</small>";
    echo "<br>------------------------------------<br>";
}
?>

</div>
</div>

<?php include 'footer.php' ?>
