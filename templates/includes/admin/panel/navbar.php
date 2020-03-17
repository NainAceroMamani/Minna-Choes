<!-- Sidebar Menu -->
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
            Compra
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="<?php echo BASEPATH.'compra' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista de Compras</p>
            </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
            Productos
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="<?php echo BASEPATH.'producto' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista de Productos</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="<?php echo BASEPATH.'producto?action=2' ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear Producto</p>
            </a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Clientes<i class="right fas fa-angle-left"></i></p></a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'cliente' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Lista de Clientes</p></a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Categorias<i class="right fas fa-angle-left"></i></p></a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'categoria' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Lista de Categorias</p></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'categoria?action=1' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Crear Categoria</p></a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>SubCategorias<i class="right fas fa-angle-left"></i></p></a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'subcategoria' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Lista de Subcategorias</p></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'subcategoria?action=1' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Crear Subcategoria</p></a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Marcas<i class="right fas fa-angle-left"></i></p></a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'marca' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Lista de Marcas</p></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'marca?action=1' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Crear Marca</p></a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Colores<i class="right fas fa-angle-left"></i></p></a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'color' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Lista de Colores</p></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'color?action=1' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Crear Colore</p></a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Usuarios<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'usuario' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Lista de Usuarios</p></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'usuario?action=1' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Crear Usuario</p></a>
            </li>
        </ul>
    </li>

    <li class="nav-item has-treeview">
        <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Monedas<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo BASEPATH.'moneda' ?>" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Lista de Monedas</p></a>
            </li>
        </ul>
    </li>
</ul>
</nav>
<!-- /.sidebar-menu -->