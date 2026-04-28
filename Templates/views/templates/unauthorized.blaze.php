<?php
    use \Facades\Route;
    use \Core\Auth;
?>
<?=component('head')?>
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
          <div class="card m-2">
              <div class="card-header">
                Acesso Negado
              </div>
              <div class="card-body">
                <figure>
                  <blockquote class="blockquote">
                    <h4>Você não tem permissão</h4>
                  </blockquote>
                   <p class="p-1 ">Entre em contato com seu administrador ou retorne para uma página segura.</p>
                </figure>
                  <button onclick="window.history.back()"  class="btn btn-primary px-6" > ← Voltar
                    </button>
              </div>
            </div>
        </div>
    </div>      
      <?=component('feetlb')?> 