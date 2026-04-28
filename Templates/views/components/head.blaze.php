<!DOCTYPE html>
<?php
    use \Facades\Route;
    use \Core\Auth;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php
        if(Route::is('blog'))
        {
            echo '<title>Blog</title>';
        }
        if(Route::is('blog/add'))
        {
            echo '<title>Cadastrar Blog</title>';
        }
        if(Route::is('dash'))
        {
            echo '<title>Dashboard</title>';
        }
        if(Route::is('admin'))
        {
            echo '<title>Gerenciar usuários</title>';
        }
        if(Route::is('users'))
        {
            echo '<title>Editar usuário</title>';
        }
        if(Route::is('profile'))
        {
            echo '<title>Profile do usuário</title>';
        }
        if(Route::is('admin/add'))
        {
            echo '<title>Cadastrar usuário</title>';     
        }
        if(Route::is('users/edit'))
        {
            echo '<title>Editar usuário</title>';     
        }
        unset($_SESSION['back']);
        $_SESSION['back'] = @$_SERVER['HTTP_REFERER'];

    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" Content-Type= "text/plain; charset=utf-8" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" Content-Type= "text/plain; charset=utf-8"  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" Content-Type= "text/plain; charset=utf-8" >
    <?=css('css/main.css')?>
</head>
