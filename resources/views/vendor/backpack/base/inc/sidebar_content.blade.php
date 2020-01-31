<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i> داشبورد</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-car nav-icon"></i> {{ __('sidebar.car') }} </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('car') }}'><i class='nav-icon fa fa-car'></i> {{ __('sidebar.addCar') }}</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('carfeature') }}'><i class='nav-icon fa fa-sitemap'></i>  {{ __('sidebar.addCarFeature') }}</a></li>
    </ul>
</li>
