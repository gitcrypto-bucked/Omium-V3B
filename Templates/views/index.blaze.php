<?=component('head')?>
<body>

    <?=component('sidebar')?>
    <?=component('navbar')?>
    
    <div class="main-content"> 
        <div class="container-xl">
        <div class="p-5 mb-4 bg-white border rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome back!</h1>
                <p class="col-md-8 fs-4">This layout uses CSS transitions to expand the sidebar on hover. It's built with <strong>Bootstrap 5.3</strong> utility classes for the content and custom CSS for the navigation logic.</p>
                <button class="btn btn-primary btn-lg" type="button" >View Stats</button>
            </div>
        </div>

        <div class="row align-items-md-stretch">
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