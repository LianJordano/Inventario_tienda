<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= COMPANY ?></title>
  <link rel="stylesheet" href="<?= URL ?>libs/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="<?= URL ?>assets/main.css">
  <script src="https://kit.fontawesome.com/36668bc8ff.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="<?=URL?>libs/datatables/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?=URL?>libs/datatables/datatables-responsive/css/responsive.bootstrap4.css">
  <link rel="stylesheet" href="<?=URL?>libs/datatables/datatables-buttons/css/buttons.bootstrap4.css">
  
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand mr-4" href="#"><i class="fas fa-store-alt"></i> <?= COMPANY ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>main/index"><i class="fas fa-home"></i> Inicio
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cubes"></i> Categorias</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?= URL ?>categoria/index">Categorias</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-truck-loading"></i> Productos</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?=URL?>producto/index">Productos</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="<?= URL ?>empresa/index" role="button" aria-haspopup="true" aria-expanded="false"><i class="far fa-building"></i> Distribuidores</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?= URL ?>empresa/index">Empresas</a>
              <a class="dropdown-item" href="<?= URL ?>proveedor/index">Proveedores</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="<?= URL ?>reporte/index" role="button" aria-haspopup="true" aria-expanded="false"> Reportes</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?= URL ?>reporte/productos">Reporte de productos existentes</a>
            </div>
          </li>



        </ul>
      </div>
    </div>
  </nav>