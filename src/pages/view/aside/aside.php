<?php

session_start();
$is_logged = isset($_SESSION['logged']) && $_SESSION['logged'] === true;

if ($is_logged){
    echo '
    <aside id="menu-content" class="aligned">
    <ul>
        <div class="center">
            <a href="/src/pages/login/index-user.html">
                <button><img src="/src/assets/img/logo.png" alt="logo-home-page"></button>
            </a>
        </div>
        <li><a href="/src/pages/view/aside/informacion.html"><button>Información cuenta</button></a></li>
        <li><a href="/src/pages/view/aside/direcciones.html"><button>Direcciones</button></a></li>
        <li><a href="/src/pages/view/aside/historialydetalles.html"><button>Historial y detalles</button></a></li>
        <li><a href="/src/pages/view/aside/facturasporabono.html"><button>Facturas por abono</button></a></li>
        <li><a href="/src/pages/view/aside/cuponesdedescuento.html"><button>Cupones de descuento</button></a></li>
        <li><a href="/src/pages/view/aside/milistadedeseos.html"><button>Mi lista de deseos</button></a></li>
        <li><a href="/src/pages/view/aside/myalerts.html"><button>My alerts</button></a></li>
        <?php
            if ($_SESSION["admin"] == true){
                ?>
                    <li><a href="/src/pages/view/aside/admin.html"><button>Admin</button></a></li>
                <?php
            }
        ?>
        <li><a href="/src/pages/view/aside/soportetecnico.php"><button>Soporte técnico</button></a></li>
    </ul>
    </aside>';
} else {
    echo '        <!-- Aside -->
    <button id="menu-toggle">Mostrar Menú</button>

    <aside id="menu-content" class="aligned menu-hidden">
        <div class="center">
            <a href="/src/index.html">
                <button><img src="/src/assets/img/logo.png" alt="logo-home-page"></button>
            </a>
        </div>
        <ul>
            <li class="content-locked"><a href="#"><button>Información cuenta</button></a></li>
            <li class="content-locked"><a href="#"><button>Direcciones</button></a></li>
            <li class="content-locked"><a href="#"><button>Historial y detalles</button></a></li>
            <li class="content-locked"><a href="#"><button>Facturas por abono</button></a></li>
            <li class="content-locked"><a href="#"><button>Cupones de descuento</button></a></li>
            <li class="content-locked"><a href="#"><button>Mi lista de deseos</button></a></li>
            <li class="content-locked"><a href="#"><button>My alerts</button></a></li>
            <li><a href="/src/aside/soportetecnico.html"><button>Soporte técnico</button></a></li>
        </ul>
    </aside>';
};
