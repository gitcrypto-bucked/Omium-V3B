
	<?php 
		use \Core\Auth;
         use Facades\Storage;
	?><?=component('head')?>
<body>

    <?=component('sidebar')?>
    <?=component('navbar')?>
    <head>
        <style>
            .btn_add{
                border-radius: 30px;
                width:155px !important;
                font-weight:650;
                font-size:16px;
                background-color:#bfb6b0 !important;
                border:0px ;
                height:45px;
            }

            .circle {
                width: 100px;           /* Set equal width and height */
                height: 100px;
                background-color: #aaaaaa !important; /* Inner color of the circle */
                border: 5px solid #aaaaaa ;  /* The border: width, style, and color */
                border-radius: 50%;     /* Makes the square element a circle */
                }
        </style>
    </head>
    <div class="main-content"> 
        <div class="container-xl">
            <?php if(Auth::logged()) :  ?>
                <div class="d-flex justify-content-between col mt-2 mb-2">
                <h4 class="text-black font-bold px-2 py-2"><?=sayHello(Auth::user()['name'])?></h4> 
                </div>
            <?php endif; ?>
            <div class="p-5 mb-4 bg-white border rounded-3 ">
                <div class="container-fluid py-5 d-none">
                    <h1 class="display-5 fw-bold">Welcome back!</h1>
                    <p class="col-md-8 fs-4">This layout uses CSS transitions to expand the sidebar on hover. It's built with <strong>Bootstrap 5.3</strong> utility classes for the content and custom CSS for the navigation logic.</p>
                    <button class="btn btn-primary btn-lg" type="button" >View Stats</button>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?=url('/admin/add') ?>" autocomplete="off">
              <?php if(isset($_SESSION['error']) && !is_null($_SESSION['error'])): ?>
                <div class="alert alert-danger" id='error'>
                    <?php echo $_SESSION['error']; ?>
                    <?php $_SESSION['error'] = null ;?>
                    <?php unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['success']) && !is_null($_SESSION['success'])): ?>
                <div class="alert alert-success" id='success'>
                    <?php echo $_SESSION['success']; ?>
                    <?php $_SESSION['success'] = null; ?>
                    <?php unset($_SESSION['success']); ?>
                </div>                    
            <?php endif; ?>
            <?php if(isset($_SESSION['info']) && !is_null($_SESSION['info'])): ?>
                <div class="alert alert-warning" id='info'>
                    <?php echo $_SESSION['info']; ?>
                    <?php $_SESSION['info'] = null; ?>
                    <?php unset($_SESSION['info']); ?>
                </div>
            <?php endif; ?>
            <?=csrf_token();?>
                <div class="mb-3">
                     <h5>Cadastrar Usuário</h5>
                    <hr>
                </div>
                <div class="mb-3">
                    
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name='name' required >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                   <input type="email" class="form-control" id="email" name='email' required >
                </div>
                
                <div class="mb-3">
                    <h6>Permissões  </h6>
                    <?php for($i =0 ; $i < sizeof($perm); $i++) :?>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="<?=$perm[$i]?>" name="<?=$perm[$i]?>">
                        <label class="form-check-label" for="<?=$perm[$i]?>"><?=ucfirst($perm[$i])?></label>
                    </div>
                    <?php endfor;?>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="button" class="btn btn-secondary" onclick="history.back();">Voltar</button>
            </form>
        </div>
    </div>
    </div>
    <script>
     
    </script>
   <?=component('feetlb')?> 