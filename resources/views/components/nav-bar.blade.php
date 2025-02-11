<nav id="sidebar" class="bg-light sidebar d-flex flex-column text-dark">
    <div class="sidebar-toggler bg-light rounded-1" onclick="toggleSidebar(this)"><i class="bi bi-chevron-double-right"></i></div>
    <div class="logo-sidebar py-4 d-flex align-items-center">
        <x-logo/>
        <span class="logo-text font-bold">
         <x-product-name-logo/>
        </span>
    </div>
    <ul class="nav flex-column pt-5 font-size-2">
        <li class="nav-item mt-1">
            <a href="{{route('admin.dashboard')}}" class="nav-link text-dark btn btn-light rounded-0">
                <i class="bi bi-house-door"></i>
                <span>Inicio</span>
            </a>
        </li>
        <li class="nav-item mt-1">
            <a href="#" class="nav-link text-dark btn btn-light rounded-0">
                <i class="bi bi-box-seam"></i>
                <span>Inventario</span>
            </a>
            <ul class="font-size-1">
                <ui class="nav-subordinate">
                    <a href="{{route('products.index')}}" class="nav-link text-dark btn btn-light rounded-0">
                        Productos
                    </a>
                </ui>
                <ui class="nav-subordinate">
                    <a href="{{route('categories.index')}}" class="nav-link text-dark btn btn-light rounded-0">
                        Categorias
                    </a>
                </ui>
            </ul>
        </li>
        <li class="nav-item mt-1">
            <a href="{{route('store')}}" target="_blank" class="nav-link text-dark btn btn-light rounded-0">
                <i class="bi bi-shop"></i>
                <span>Store</span>
            </a>
        </li>
    </ul>
    <ul class="nav flex-column mt-auto mb-4 font-size-2">
        <li class="nav-item">
            <a href="" class="nav-link text-dark bg-cus-primary btn btn-light rounded-0">
                <i class="">NB</i>
                <span>Nicolás Berdú</span>
            </a>
            <ul class="font-size-1">
                <ui class="nav-subordinate">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button  class="nav-link text-dark w-100 btn btn-light rounded-0">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Cerrar sesión</span>
                        </button>
                    </form>
                </ui>
            </ul>
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