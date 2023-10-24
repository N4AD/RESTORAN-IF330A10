<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Food Hub</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">FH</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->routeIs('admin.home') ? 'active':'' }}">
                <a href="{{ route('admin.home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="dropdown {{ request()->routeIs('category.*') ? 'active':'' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request('type') == 'menu' ? 'active':'' }}"><a class="nav-link" href="{{ route('category.index').'?type=menu' }}">Menu Category</a></li>
                    <li class="{{ request('type') == 'blog' ? 'active':'' }}"><a class="nav-link" href="{{ route('category.index').'?type=blog' }}">Blog Category</a></li>
                    <li class="{{ request()->routeIs('category.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('category.create') }}">Create Category</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->routeIs('menu.*') ? 'active':'' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Menu</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('menu.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('menu.index') }}">Menu List</a></li>
                    <li class="{{ request()->routeIs('menu.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('menu.create') }}">Create Menu</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->routeIs('blog.*') ? 'active':'' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('blog.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('blog.index') }}">Blog List</a></li>
                    <li class="{{ request()->routeIs('blog.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('blog.create') }}">Create Blog</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->routeIs('gallery.*') ? 'active':'' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Gallery</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request('type') == 'photo' ? 'active':'' }}"><a class="nav-link" href="{{ route('gallery.index').'?type=photo' }}">Photo Gallery</a></li>
                    <li class="{{ request('type') == 'video' ? 'active':'' }}"><a class="nav-link" href="{{ route('gallery.index').'?type=video' }}">Video Gallery</a></li>
                    <li class="{{ request()->routeIs('gallery.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('gallery.create') }}">Add Gallery</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->routeIs('slider.*') ? 'active':'' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Slider</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('slider.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('slider.index') }}">All Slider Image</a></li>
                    <li class="{{ request()->routeIs('slider.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('slider.create') }}">Add Slider Image</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->routeIs('service.*') ? 'active':'' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Service</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('service.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('service.index') }}">All Services</a></li>
                    <li class="{{ request()->routeIs('service.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('service.create') }}">Create Service</a></li>
                </ul>
            </li>
            <li class="dropdown {{ request()->routeIs('staff.*') ? 'active':'' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Staff</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->routeIs('staff.index') ? 'active':'' }}"><a class="nav-link" href="{{ route('staff.index') }}">All Staffs</a></li>
                    <li class="{{ request()->routeIs('staff.create') ? 'active':'' }}"><a class="nav-link" href="{{ route('staff.create') }}">Create Staff</a></li>
                </ul>
            </li>
            <li class="{{ request()->routeIs('admin.reserve') ? 'active':'' }}">
                <a href="{{ route('admin.reserve') }}" class="nav-link"><i class="fas fa-fire"></i><span>Reservations</span></a>
            </li>
            <li class="{{ request()->routeIs('admin.order') ? 'active':'' }}">
                <a href="{{ route('admin.order') }}" class="nav-link"><i class="fas fa-fire"></i><span>Orders</span></a>
            </li>
            <li class="{{ request()->routeIs('admin.general') ? 'active':'' }}">
                <a href="{{ route('admin.general') }}" class="nav-link"><i class="fas fa-fire"></i><span>General Information</span></a>
            </li>
        </ul>
    </aside>
</div>
