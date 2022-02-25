<ul class="firstNavBar">
    <li class="firstNavBar_logo"><a class="link" href="#">
    <img class="logo_img" src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo">
    </a>

    </li>
    <li class="firstNavBar_MyAccount">
        <?php
            if((isset($_SESSION['loggedin']))){
                echo "<a class='account name link' href='/phpmotors/accounts/'>Welcome  ". $_SESSION['clientData']['clientFirstname']." </a>";
                echo "<a class='link account' href='/phpmotors/accounts/index.php?action=LogOut'>|  Log Out  |</a>";
            }else{
                echo "<a class='link account' href='/phpmotors/accounts/index.php?action=login'>My Account</a>";
                }
        ?>
    </li>


</ul>




