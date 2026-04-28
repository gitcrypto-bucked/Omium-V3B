	<?php
 use Core\Auth;
 use Facades\Storage;
 component("head")
 ?> 
<head>
    <style>
        .btn_add {
        border-radius: 30px;
        width: 155px !important;
        font-weight: 650;
        font-size: 16px;
        background-color: #bfb6b0 !important;
        border: 0px;
        height: 45px;
        }
    </style>

</head>
 <body> 
<?= component("sidebar") ?> 
<?= component("navbar") ?>

<div class="main-content"> 
        <div class="container-xl">
             <?php if (Auth::logged()): ?> 
                <div class="d-flex justify-content-between col mt-2 mb-2">
	            <h4 class="text-black font-bold px-2 py-2"> <?= sayHello(Auth::user()["name"]) ?> </h4>
	            <button type="button" class="btn btn_add btn-secondary" onclick="location.href='<?= url('admin/add') ?>'">
	                <i class="bi bi-plus-lg"></i> Adicionar 
                </button>
	      </div> 
          <?php endif; ?>
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
                <hr class="mt-2 mb-2">
                <h6 class="mt-2 mb-2">Usuários do Sistema</h6>
            <table class="table table-striped-columns mt-3 mb-2" id="usuarios">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Status</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            for($i =0; $i < sizeof($users); $i++)
                            {
                                print_r('<tr>
                                            <th scope="row">'.$users[$i]['id'].'</th>
                                            <td>'.$users[$i]['name'].'</td> 
                                            <td>'.$users[$i]['email'].'</td> 
                                            <td>'.(boolval($users[$i]['active'])?'ativo':'inativo').'</td>
                                            <td>
                                                <a class=""   href="'.url('users/edit/'.base64_encode($users[$i]['id'])).'">Edit</a>
                                                <a class="" href="'.url('users/delete/'.base64_encode($users[$i]['id'])).'">Delete</a>
                                            </td> 
                                            </tr>'
                                        );
                            }    
                        ?>
                </tbody>    
            </table>
         
        </div>   
</div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" content-type= "application/javascript;charset=utf-8"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js" content-type= "application/javascript;charset=utf-8"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.bootstrap5.js" content-type= "application/javascript;charset=utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js" content-type= "application/javascript;charset=utf-8"></script>
<script>


const lang = "<?=asset('js/pt-BR.json')?>";
    	
new DataTable('#usuarios',
    {
        language: {url:lang},
        "pageLength": 25
    }
);
</script>
<?=component('feetlb')?> 