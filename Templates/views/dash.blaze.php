<!DOCTYPE HTML>
	<?php 
		use \Core\Auth;
        @Auth::check();
	?>
    <?=component('head')?>
    <head>
        <style>
             .card_img
            {
                height:60px;
                background-color: #d1dcd9 !important;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
    </head>
<body>

    <?=component('sidebar')?>
    <?=component('navbar')?>
    
    <div class="main-content"> 
      
        <div class="container-xl">
          <?php if(Auth::logged()) :  ?>
            <h4 class="text-black font-bold px-2"><?=sayHello(Auth::user()['name'])?></h4>
          <?php endif; ?>
              <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
                    <div class="col">
                        <div class="card">
                        <a  class="card-img-top card_img p-3" style="color: #000000; font-weight:650; font-size:24px" ><i class="bi bi-people-fill h2"></i> Usuários</a>
                        <div class="card-body">
                            <p class="card-text">Quantidade de usuários cadastrados pro periodos.</p>
                            <canvas id="users" style="width: 600px;height:600px;"></canvas>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                        <a  class="card-img-top card_img p-3" style="color: #000000; font-weight:650; font-size:24px" ><i class="bi bi-question-square-fill h2"></i> Suporte</a>
                        <div class="card-body">
                            <p class="card-text">Fila do suporte por periodo</p>
                            <canvas id="support" style="width: 600px;height:600px;"></canvas>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                        <a  class="card-img-top card_img p-3" style="color: #000000; font-weight:650; font-size:24px" ><i class="bi bi-question-square-fill h2"></i> 3</a>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                        <a  class="card-img-top card_img p-3" style="color: #000000; font-weight:650; font-size:24px" ><i class="bi bi-question-square-fill h2"></i> 4</a>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        </div>
                    </div>
                    </div>
        </div>
    <div>  
        
    <script>
          const ctx = document.getElementById('users');
          let users = <?php echo json_encode($graph1['users']); ?>;  
          let labels = <?php echo json_encode($graph1['date']); ?>;  
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: [{
                label: 'Qtde of Users',
                data: users,
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
</script>
<?=component('feetlb')?>