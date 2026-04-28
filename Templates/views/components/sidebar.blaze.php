 	<?php 
        use \Facades\Route;
		use \Core\Auth;
        use \Facades\Storage;
	?>
 <div class="sidebar d-flex flex-column">
    <div class="logo">
        <i class="bi bi-lightning-fill"></i>
        <span class="link-text">CoreApp</span>
    </div>
    
    
    <ul class="nav nav-pills flex-column mb-auto" style="list-style-type: none !important;">
        <?php if(Auth::logged()) :  ?>
            <li class="nav-item">   
                <a href="<?=url('dash') ?>" class="nav-link <?=  Route::is('dash') ? 'active' : ''   ?>">
                    <i class="bi bi-house"></i>
                    <span class="link-text">Dashboard</span>
                </a>
            </li>
        <?php else: ?>
             <li class="nav-item">
                <a href="<?=url('index') ?>" class="nav-link <?=  Route::is('index') ? 'active' : ''   ?>">
                    <i class="bi bi-house"></i>
                    <span class="link-text">Home</span>
                </a>
            </li>
        <?php endif; ?>    
        <li>
            <a href="<?=url('blog') ?>" class="nav-link <?=  Route::is('blog') ? 'active' : ''   ?> ">
                <i class="bi bi-journal"></i>
                <span class="link-text">Blog</span>
            </a>
        </li>
       
        <?php if(Auth::logged()) :  ?>
        <li>
            <a href="<?=url('profile')?>" class="nav-link <?=  Route::is('profile') ? 'active' : ''   ?>">
                <i class="bi bi-person"></i>
                <span class="link-text">Profile</span>
            </a>
        </li>
            <?php if(boolval(Auth::user()['admin'])) : ?>
                <li>
                    <a href="<?=url('admin')?>" class="nav-link <?=  Route::is('admin') ? 'active' : ''   ?>">
                        <i class="bi bi-people"></i>
                        <span class="link-text">Usuários</span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>

</div>