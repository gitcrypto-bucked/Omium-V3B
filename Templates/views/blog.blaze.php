	<?php
 use Core\Auth;
 use Facades\Storage;
 component("head")
 ?> <body> <?= component("sidebar") ?> <?= component("navbar") ?> <head>
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
	  <div class="main-content">
	    <div class="container-xxl"> <?php if (Auth::logged()): ?> <div class="d-flex justify-content-between col mt-2 mb-2">
	        <h4 class="text-black font-bold px-2 py-2"> <?= sayHello(
                    Auth::user()["name"],
                ) ?> </h4>
	        <button type="button" class="btn btn_add btn-secondary" onclick="location.href='<?= url("blog/add") ?>'">
	          <i class="bi bi-plus-lg"></i> Adicionar </button>
	      </div> <?php endif; ?> <div class="p-5 mb-4 bg-white border rounded-3 d-none">
	        <div class="container-fluid py-5">
	          <h1 class="display-5 fw-bold">Welcome back!</h1>
	          <p class="col-md-8 fs-4">This layout uses CSS transitions to expand the sidebar on hover. It's built with <strong>Bootstrap 5.3</strong> utility classes for the content and custom CSS for the navigation logic. </p>
	          <button class="btn btn-primary btn-lg" type="button">View Stats</button>
	        </div>
	      </div> <?php
        print_r('
			<div class="row align-items-md-stretch mb-2 mt-2">');
        for ($i = 0; $i < sizeof($blog["items"]); $i++) {
            print_r(
                '
				<div class="col card m-1">
					<div class="h-100 p-5 bg-white text-black rounded-3">
						<h4>' .
                    $blog["items"][$i]["titulo"] .
                    '</h4>
						<img src="' .
                    Storage::urlRead("blog/", $blog["items"][$i]["thumb"]) .
                    '" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block p-2">
							<p style="font-size:12px;" class="p-2">' .
                    $blog["items"][$i]["subtitulo"] .
                    '</p>
						</div>
					</div>',
            );
        }
        print_r("
				</div>");
        ?> <div class="row align-items-md-stretch d-none">
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
	      </div> <?= paginate($blog) ?> </div>
	  </div>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/dist/js/bootstrap.bundle.min.js"></script>
	</body>
	</html>