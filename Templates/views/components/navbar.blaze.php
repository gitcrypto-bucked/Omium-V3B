<?php
    use \Facades\Route;
    use \Core\Auth;
?>
<div class="main bg-primary" >
        <nav class="navbar  sticky-top  border-body" data-bs-theme="light">
        <!-- Navbar content -->
         <div class="container-fluid">
            <a class="navbar-brand" style="padding-left:80px !important;color:white;font-weight:660 !important"></a>
            <div class="d-flex" role="search">
                <?php 
                    if(!Auth::logged()) 
                    {
                       echo '<a class="btn btn-outline-light" href="'.url('login').'">Login</a>';
                    }  
                    else
                    {
                        echo '<a class="btn btn-outline-light" href="'.url('logout').'">Logout</a>';
                    }      
                ?>
               
            </div> 
        </div>
        </nav>
    </div>