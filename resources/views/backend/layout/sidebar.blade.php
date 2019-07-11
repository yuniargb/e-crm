<aside class="main-sidebar hidden-print ">
    <section class="sidebar" id="sidebar-scroll">

        <div class="user-panel">
            <div class="f-left image"><img src="/assets/images/avatar-1.png" alt="User Image" class="img-circle"></div>
            <div class="f-left info">
                <p>{{ Auth::user()->nama_staf }}</p>
                <p class="designation">UX Designer <i class="icofont icofont-caret-down m-l-5"></i></p>
            </div>
        </div>
        <!-- sidebar profile Menu-->
        <ul class="nav sidebar-menu extra-profile-list">
            <li>
                <a class="waves-effect waves-dark" href="profile.html">
                    <i class="icon-user"></i>
                    <span class="menu-text">View Profile</span>
                    <span class="selected"></span>
                </a>

            </li>
            <li>
                <a class="waves-effect waves-dark" href="javascript:void(0)">
                    <i class="icon-settings"></i>
                    <span class="menu-text">Settings</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="javascript:void(0)">
                    <i class="icon-logout"></i>
                    <span class="menu-text">Logout</span>
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="nav-level">Navigation</li>
            <li class="active treeview">
                <a class="waves-effect waves-dark" href="/dashboard">
                    <i class="icon-speedometer"></i><span> Dashboard</span>
                </a>
            </li>
            <li class="nav-level">Components</li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="/pelanggan">
                    <i class="icofont icofont-users-alt-5"></i><span> Pelanggan</span>
                </a>
            </li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="/kategori">
                    <i class="icofont icofont-navigation-menu"></i><span> Kategori</span>
                </a>
            </li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="/paket">
                    <i class="icofont icofont-ticket"></i><span> Tours Package</span>
                </a>
            </li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="/invoice">
                    <i class="icofont icofont-papers"></i><span> Invoice</span>
                </a>
            </li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="/testimoni">
                    <i class="icofont icofont-star"></i><span> Testimoni</span>
                </a>
            </li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="/promo">
                    <i class="icofont icofont-megaphone-alt"></i><span> Promo</span>
                </a>
            </li>
            <li class="treeview">
                <a class="waves-effect waves-dark" href="/staf">
                    <i class="icofont icofont-user-male"></i><span> Staf</span>
                </a>
            </li>
        </ul>
    </section>
</aside>