<div class="navbar_item navbar_content_box_right">
    <div class="navbar_account_active" onclick="AccountOpenBox()">
        <img class="navbar_account_circle" src="user_active.jpg">
    </div>    
</div>
    
<div class="navbar_account_box_dropdown" id="AccountBox">
    <div class="navbar_account_box_content">
        <div class="navbar_account_box_user_data">
            <div class="nabud navbar_account_box_user_img">
                <img src="user_active.jpg">
            </div>
            <div class="nabud navbar_account_box_user">
                <div class="navbar_account_box_username">
                    <?php
                        echo $_SESSION['username'];
                    ?>
                </div>
                <div class="navbar_account_box_email">
                    <?php
                        echo $_SESSION['username'];
                    ?>
                </div>
            </div>
        </div>

        <div class="navbar_account_box_dashboard">
            <a href = "dashboard.php">
                <div class="navbar_account_box_dashboard_content">
                    <img src="" style="vertical-align: middle">
                    <span class="navbar_account_box_dashboard_name">Account</span>
                </div>
            </a>
            <a href = "reserve.php">
                <div class="navbar_account_box_dashboard_content">
                    <img src="" style="vertical-align: middle">
                    <span class="navbar_account_box_dashboard_name">Rooster</span>
                </div>
            </a>
            <a href = "settings.php">
                <div class="navbar_account_box_dashboard_content">
                    <img src="" style="vertical-align: middle">
                    <span class="navbar_account_box_dashboard_name">Instellingen</span>
                </div>
            </a>
            <a href = "logout.php">
                <div class="navbar_account_box_dashboard_content" style="border-top: 1px solid #bdbdbdbd">
                    <img src="" style="vertical-align: middle">
                    <span class="navbar_account_box_dashboard_name">Log Uit</span>
                </div>
            </a>
            <button type = "button" class="btn_cancel" onclick="AccountCloseBox()">Sluiten</button>
        </div>
    </div>
</div>




