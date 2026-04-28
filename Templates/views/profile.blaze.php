
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
            <form method="post" enctype="multipart/form-data" action="<?=url('profile') ?>" autocomplete="off">
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
                     <p>Perfil do Usuário</p>
                    <hr>
                   <img src="<?php echo strlen($user['avatar'])? Storage::urlRead("avatar/", $user['avatar']) : asset('img/user-avatar.png') ?>"  class="img-fluid rounded-circle circle" id='preview'>
                </div>
                <div class="mb-3">
                    
                    <input type="hidden" id="id" name="id" value="<?=$user['id'];?>">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name='name'  readonly value="<?=$user['name']?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                   <input type="email" class="form-control" id="email" name='email' value="<?=$user['email']?>" readonly>
                </div>
                 <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                   <input type="password" class="form-control" id="password" name='password' value="<?=$user['password']?>"  required>
                </div>
                 <div class="mb-3">
                    <label for="cpassword" class="form-label">Confimação de Senha</label>
                   <input type="password" class="form-control" id="cpassword" name='cpassword' value="<?=$user['password']?>"   required>
                </div>
               
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="reset" class="btn btn-secondary" onclick="clean()">Limpar</button>
            </form>
            <hr>
            <form method="post" enctype="multipart/form-data" action="<?=url('/user/avatar') ?>" autocomplete="off">
                 <?=csrf_token();?>
                 <div class="mb-3 ">
                     <label for="avatar" class="form-label">Avatar</label>
                     <input type="file" class="form-control" id="avatar" name='avatar'  accept="image/*" >
                </div>
                <button type="submit" class="btn btn-success">Atualizar</button>
                <button type="reset" class="btn btn-secondary" onclick="clean()">Limpar</button>
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
    <script>
            const fileInput = document.getElementById('avatar');
            const imagePreview = document.getElementById('preview');

            fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the first selected file

            if (file && file.type.startsWith('image/')) {
                // Create a temporary URL for the selected file
                const imageUrl = URL.createObjectURL(file);

                // Set the source of the image preview element
                imagePreview.src = imageUrl;
                imagePreview.style.display = 'block'; // Make the image visible

                // Optional: Revoke the object URL when the image is loaded to free up memory
                imagePreview.onload = () => {
                URL.revokeObjectURL(imageUrl);
                };
            } else {
                // Handle cases where a non-image file is selected or selection is cancelled
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
            });


            function clean()
            {
                document.getElementById('preview').src="<?=asset('img/user-avatar.png')?>";
            }
    </script>
   <?=component('feetlb')?> 