<nav id="sidebar" class="bg-light sidebar d-flex flex-column text-dark">
    <div class="sidebar-toggler bg-light rounded-1" onclick="toggleSidebar(this)"><i class="bi bi-chevron-double-right"></i></div>
    <div class="logo-sidebar py-4 d-flex align-items-center">
        <x-logo/>
        <span class="logo-text font-bold">
         <x-product-name-logo/>
        </span>
    </div>
    <ul class="nav flex-column pt-5">
        <li class="nav-item">
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-house"></i>
                <span>Inicio</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-gear"></i>
                <span>Configuración</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-dark">
                <i class="bi bi-info-circle"></i>
                <span>Acerca de</span>
            </a>
        </li>
    </ul>
    <ul class="nav flex-column mt-auto mb-4">
        <li class="nav-item">
            <a href="" class="nav-link text-dark bg-cus-primary">
                <i class="">NB</i>
                <span>Nicolás Berdú</span>
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button  class="nav-link text-dark w-100">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Cerrar sesion</span>
                </button>
            </form>
        </li>
    </ul>

</nav>
<script>
    function toggleSidebar(toggle) {
        const sidebar = document.getElementById('sidebar');
        const logo = document.getElementById('logo');
        const minimalLogo = document.getElementById('minimal-logo');

        sidebar.classList.toggle('expanded');

        toggle = toggle.children[0];
        if(toggle.classList.contains('bi-chevron-double-right')){
            toggle.classList.replace('bi-chevron-double-right', 'bi-chevron-double-left');
        }else{
            toggle.classList.replace('bi-chevron-double-left', 'bi-chevron-double-right');
        }
    }
</script>