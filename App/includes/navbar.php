<!-- NAVBAR - lateral -->
<nav class="close">
        <div class="logo-name">
            <div class="logo-image">
                <img src="<?=URL_PATH?>/assets/img/logoDv.png" alt="Asistentes-Inmobiliarios-logo">
            </div>
            <span class="logo_name">Inmobiliaria</span>
        </div>
        <!-- links -->
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="<?=URL_PATH?>/render/inicio">
                <i class="fa-solid fa-cube"></i>
                    <span class="link-name">Inicio</span>
                </a></li>
                <li><a href="<?=URL_PATH?>/render/lotes">
                    <i class="fa-solid fa-house"></i>
                    <span class="link-name">Lotes</span>
                </a></li>
                <li><a href="<?=URL_PATH?>/render/sobreNosotros">
                    <i class="fa-solid fa-users"></i>
                    <span class="link-name">Sobre Nosotros</span>
                </a></li>
                <li><a href="<?=URL_PATH?>/render/contacto">
                    <i class="fa-solid fa-envelope"></i>
                    <span class="link-name">Contacto</span>
                </a></li>
            </ul>

            <!-- logout and darkmode and admin functions -->
            <ul class="logout-mode">
                <!-- solo para el admin -->

                <?php if(isset($_SESSION["administrador"])) : ?>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-arrow-down"></i>
                            <span class="link-name">Opciones Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=URL_PATH?>/render/crearLote">
                            <i class="fa-solid fa-clipboard"></i>
                            <span class="link-name">Crear Publicacion</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=URL_PATH?>/render/listaClientes">
                            <i class="fa-solid fa-address-card"></i>
                            <span class="link-name">Lista De clientes</span>
                        </a>
                    </li>
                    <hr>
                    <li>
                        <a href="<?= URL_PATH ?>/User/closeSc">
                            <i class="fa-solid fa-power-off"></i>
                            <span class="link-name admin">Cerrar Sesión</span>
                        </a>
                    </li>

                <?php endif?>
                <li class="mode">
                    <a href="#">
                        <i class="fa-solid fa-moon"></i>
                        <span class="link-name">Modo Oscuro</span>
                    </a>
                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>

        </div>

    </nav>