<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>
            @can('order-list')
            <li class="treeview">
                <a href="{{ route('order.index') }}" class="{{ request()->is('order') || request()->is('order/create') || request()->is('order/*/show') || request()->is('order/*/edit') || request()->is('order/*') ? 'active' : '' }}">
                    <i class="fa fa-wrench"></i> <span>orders</span>
                </a>
            </li>
            @endcan


            @can('page-list')
            <li class="treeview">
                <a href="{{ route('page.index') }}" class="{{ request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active' : '' }}">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                </a>
            </li>
            @endcan
            @can('role-list')
            <li class="treeview">
                <a href="{{ route('role.index') }}" class="{{ request()->is('role') || request()->is('role/create') || request()->is('role/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-tasks"></i> <span>Roles</span>
                </a>
            </li>
            @endcan
            @can('user-list')
            <li class="treeview">
                <a href="{{ route('user.index') }}" class="{{ request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
            @endcan
            @can('permission-list')
            <li class="treeview">
                <a href="{{ route('permission.index') }}" class="{{ request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-lock"></i> <span>Permissions</span>
                </a>
            </li>
            @endcan
            @can('category-list')
            <li class="treeview">
                <a href="{{ route('category.index') }}" class="{{ request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-list-alt"></i> <span>Categories</span>
                </a>
            </li>
            @endcan
            @can('product-list')
            <li class="treeview">
                <a href="{{ route('product.index') }}" class="{{ request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-product-hunt"></i> <span>Products</span>
                </a>
            </li>
            @endcan
            @can('about_us-list')
            <li class="treeview">
                <a href="{{ route('about_us.index') }}" class="{{ request()->is('about_us') || request()->is('about_us/create') || request()->is('about_us/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-sticky-note"></i> <span>About Us</span>
                </a>
            </li>
            @endcan
            @can('why_choose_us-list')
            <li class="treeview">
                <a href="{{ route('why_choose_us.index') }}" class="{{ request()->is('why_choose_us') || request()->is('why_choose_us/create') || request()->is('why_choose_us/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-question"></i> <span>Why Choose Us</span>
                </a>
            </li>
            @endcan
            @can('faq-list')
            <li class="treeview">
                <a href="{{ route('faq.index') }}" class="{{ request()->is('faq') || request()->is('faq/create') || request()->is('faq/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-question-circle"></i> <span>Faqs</span>
                </a>
            </li>
            @endcan

           @can('coupon-list')
            <li class="treeview">
                <a href="{{ route('coupon.index') }}" class="{{ request()->is('coupon') || request()->is('coupon/create') || request()->is('coupon/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-graduation-cap"></i> <span>Coupons</span>
                </a>
            </li>
            @endcan
            @can('slider-list')
            <li class="treeview">
                <a href="{{ route('slider.index') }}" class="{{ request()->is('slider') || request()->is('slider/create') || request()->is('slider/*/edit') || request()->is('slider/*') ? 'active' : '' }}">
                    <i class="fa fa-sliders"></i> <span>Sliders</span>
                </a>
            </li>
            @endcan
            @can('how_to_play-list')
            <li class="treeview">
                <a href="{{ route('how_to_play.index') }}" class="{{ request()->is('how_to_play') || request()->is('how_to_play/create') || request()->is('how_to_play/*/edit') || request()->is('how_to_play/*') ? 'active' : '' }}">
                    <i class="fa fa-book"></i> <span>How To Play</span>
                </a>
            </li>
            @endcan
                {{--    @can('booking_type-list')
            <li class="treeview">
                <a href="{{ route('booking_type.index') }}" class="{{ request()->is('booking_type') || request()->is('booking_type/*')? 'active' : '' }}">
                    <i class="fa fa-book"></i> <span>Booking Types</span>
                </a>
            </li>
            @endcan
            @can('course-list')
            <li class="treeview">
                <a href="{{ route('course.index') }}" class="{{ request()->is('course') || request()->is('course/create') || request()->is('course/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-certificate"></i> <span>Courses</span>
                </a>
            </li>
            @endcan
            @can('service-list')
            <li class="treeview">
                <a href="{{ route('service.index') }}" class="{{ request()->is('service') || request()->is('service/create') || request()->is('service/*/edit') || request()->is('service/*') ? 'active' : '' }}">
                    <i class="fa fa-wrench"></i> <span>Services</span>
                </a>
            </li>
            @endcan
            @can('slider-list')
            <li class="treeview">
                <a href="{{ route('slider.index') }}" class="{{ request()->is('slider') || request()->is('slider/create') || request()->is('slider/*/edit') || request()->is('slider/*') ? 'active' : '' }}">
                    <i class="fa fa-sliders"></i> <span>Sliders</span>
                </a>
            </li>
            @endcan --}}

           {{--
            @can('testimonial-list')
            <li class="treeview">
                <a href="{{ route('testimonial.index') }}" class="{{ request()->is('testimonial') || request()->is('testimonial/create') || request()->is('testimonial/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-quote-right"></i> <span>Testimonial</span>
                </a>
            </li>
            @endcan
            @can('advantage-list')
            <li class="treeview">
                <a href="{{ route('advantage.index') }}" class="{{ request()->is('advantage') || request()->is('advantage/create') || request()->is('advantage/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-tag"></i> <span>Mock Advantage</span>
                </a>
            </li>
            @endcan
            @can('how_work-list')
            <li class="treeview">
                <a href="{{ route('how_work.index') }}" class="{{ request()->is('how_work') || request()->is('how_work/create') || request()->is('how_work/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-spinner"></i> <span>How Works</span>
                </a>
            </li>
            @endcan
            @can('package-list')
            <li class="treeview">
                <a href="{{ route('package.index') }}" class="{{ request()->is('package') || request()->is('package/create') || request()->is('package/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-gift"></i> <span>Packages</span>
                </a>
            </li>
            @endcan
            @can('team-list')
            <li class="treeview">
                <a href="{{ route('team.index') }}" class="{{ request()->is('team') || request()->is('team/create') || request()->is('team/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Team</span>
                </a>
            </li>
            @endcan
            @can('why_choose-list')
            <li class="treeview">
                <a href="{{ route('why_choose.index') }}" class="{{ request()->is('why_choose') || request()->is('why_choose/create') || request()->is('why_choose/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-question"></i> <span>Why Choose Us</span>
                </a>
            </li>
            @endcan
            @can('social media-list')
            <li class="treeview">
                <a href="{{ route('social_media.index') }}" class="{{ request()->is('social_media') || request()->is('social_media/create') || request()->is('social_media/edit/*') ? 'active' : '' }}">
                    <i class="fa fa-address-book"></i> <span>Social Media</span>
                </a>
            </li>
            @endcan --}}
        </ul>
    </section>
</aside>
