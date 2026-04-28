
	<?php 
		use \Core\Auth;
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
                height:55px;
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
            <form method="post" enctype="multipart/form-data" action="<?=url('blog/add') ?>" autocomplete="off">
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
                     <p>Cadastrar Blog</p>
                    <hr>
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="title" name='title' aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Escreva o titulo do blog</div>
                </div>
                <div class="mb-3">
                    <label for="paragraph" class="form-label">Sintese</label>
                    <textarea class="form-control" id="paragraph" name='paragraph' required></textarea>
                </div>
                <div class="mb-3 ">
                     <label for="imagem" class="form-label">Imagem</label>
                     <input type="file" class="form-control" id="imagem" name='imagem'  accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="reset" class="btn btn-secondary">Limpar</button>
            </form>
        </div>

        <div class="row align-items-md-stretch d-none">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2>Real-time Data</h2>
                    <p>The sidebar remains collapsed to save screen real estate, but gives you full context the moment you need it.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-white border rounded-3">
                    <h2>System Health</h2>
                    <p>All components are fully responsive. You can easily swap the hover logic for a click toggle on mobile devices.</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>