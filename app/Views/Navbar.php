 <nav class="navbar navbar-expand-lg bg-light">
     <div class="container-fluid">
         <a class="navbar-brand" href="#">CI4 WEB</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link" href="/">Home</a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Akademik
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="<?= base_url(); ?>dosen">Dosen</a></li>
                     </ul>
                 </li>

                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Transaksi
                     </a>
                     <ul class="dropdown-menu" >
                         <li><a class="dropdown-item" href="<?= base_url(); ?>barang">Barang</a></li>
                         <li><a class="dropdown-item" href="<?= base_url(); ?>customer">Customer</a></li>
                         <li><a class="dropdown-item" href="<?= base_url(); ?>transaksi">Transaksi</a></li>
                     </ul>
                 </li>

                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         <?= session()->get('name'); ?>
                     </a>
                     <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="<?= base_url(); ?>logout">Logout</a></li>
                     </ul>
                 </li>
             </ul>
         </div>
     </div>
 </nav>