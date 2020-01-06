<div class= "navbar_top">
    <div class= "navbar_margin">
        <div class= "navbar_item"><a href="index.php"><img class = "logo" src ="logo.png"></a></div>
        <div class= "navbar_item navbar_content_link"><a href="index.php">Home</a></div>
        <div class= "navbar_item navbar_content_link"><a href="contact.php">Contact</a></div>
        <div id ="Sidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="CloseSideNav()">&times;</a>
            <a href= "index.php">Home</a>
            <a href= "contact.php">Contact</a>
            <a href= "reserve.php">Rooster</a>
        </div>    

        <div class = "navbar_item navbar_content_box_right">
            <div class = "side_navbars">
                <span style="font-size:30px;cursor:pointer" onclick="OpenSideNav()">&#9776;</span>
            </div>
        </div>
                <?php
                    if (isset($_SESSION['username']) && $_SESSION['username'] == true){
                    include('navbar_user.php');
                    }else{
                    include('navbar2.php');
                    }
                ?>     
   </div> 
</div> 

<div class="footer_container">
			<?php
				require("footer.php");
			?>
		</div>