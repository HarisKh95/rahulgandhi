<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{route('admin.home')}}">
                @if(get_static_option('site_admin_dark_mode') == 'off')
                {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                @else
                {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
                @endif
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{active_menu('admin-home')}}">
                        <a href="{{route('admin.home')}}"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span>@lang('dashboard')</span>
                        </a>
                    </li>
                    @if('super_admin' == auth()->guard('admin')->user()->role)
                        <li class="
                        {{active_menu('admin-home/new-user')}}
                        {{active_menu('admin-home/all-user')}}">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                                <span>{{__('Admin Role Manage')}}</span></a>
                            <ul class="collapse">
                                <li class="{{active_menu('admin-home/all-user')}}"><a
                                            href="{{route('admin.all.user')}}">{{__('All Admin')}}</a></li>
                                <li class="{{active_menu('admin-home/new-user')}}"><a
                                            href="{{route('admin.new.user')}}">{{__('Add New Admin')}}</a></li>
                            </ul>
                        </li>
                        <li
                        class="main_dropdown
                        @if(request()->is(['admin-home/frontend/new-user','admin-home/frontend/all-user','admin-home/frontend/all-user/role'])) active @endif
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>{{__('Users Manage')}}</span></a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/frontend/all-user')}}"><a
                                    href="{{route('admin.all.frontend.user')}}">{{__('All Users')}}</a></li>
                            <li class="{{active_menu('admin-home/frontend/new-user')}}"><a
                                    href="{{route('admin.frontend.new.user')}}">{{__('Add New User')}}</a></li>
                        </ul>
                    </li>
                    @endif
                </li>
                <li class="main_dropdown @if(request()->is('admin-home/appointment/*')) active @endif ">
                    <a href="javascript:void(0)" aria-expanded="true">
                        <i class="ti-timer"></i><span>{{__('Appointments')}} <span class="badge">{{$pending_appointment}}</span></span></a>
                    <ul class="collapse">
                        <li class="{{active_menu('admin-home/appointment/all')}}  @if(request()->is('admin-home/appointment/edit/*')) active @endif  ">
                            <a href="{{route('admin.appointment.all')}}">{{__('All Doctors')}}</a></li>
                        <li class="{{active_menu('admin-home/appointment/new')}}">
                            <a href="{{route('admin.appointment.new')}}">{{__('New Doctor')}}</a></li>
                        <li class="{{active_menu('admin-home/appointment/category')}}">
                         <li class="{{active_menu('admin-home/appointment/appointment-search')}}">
                             <a href="{{route('admin.appointment.search')}}">{{__('Search Doctor')}}</a></li>
                         <li class="{{active_menu('admin-home/appointment/category')}}">
                             <a href="{{route('admin.appointment.category.all')}}">{{__('Doctors Category')}}</a></li>
                        <li class="{{active_menu('admin-home/appointment/booking-time')}}">
                            <a href="{{route('admin.appointment.booking.time.all')}}">{{__('Booking Time')}}</a></li>
                        <li class="{{active_menu('admin-home/appointment/booking')}}">
                            <a href="{{route('admin.appointment.booking.all')}}">{{__('All Booking')}} <span class="badge">{{$pending_appointment}}</span></a></li>
                        <li class="{{active_menu('admin-home/appointment/review')}}">
                            <a href="{{route('admin.appointment.review.all')}}">{{__('All Reviews')}}</a></li>
                        <li class="{{active_menu('admin-home/appointment/form-builder')}}">
                            <a href="{{route('admin.appointment.booking.form.builder')}}">{{__('Booking Form Builder')}}</a></li>
                        <li class="{{active_menu('admin-home/appointment/settings')}}">
                            <a href="{{route('admin.appointment.booking.settings')}}">{{__('Settings')}}</a></li>
                    </ul>
                </li>
                <li class="main_dropdown
                    @if(request()->is(['admin-home/prescription/*']))
                        active
                    @endif
                    ">
                    <a href="javascript:void(0)"
                       aria-expanded="true">
                        <i class="ti-files"></i>
                        <span>{{__('Prescriptions')}} <span class="badge">{{$pending_prescription}}</span></span>
                    </a>
                    <ul class="collapse">
                        <li class="{{active_menu('admin-home/prescription/all')}}">
                            <a href="{{route('admin.prescription.all')}}">{{__('All Prescription')}} <span class="badge">{{$pending_prescription}}</span></a></li>
                        <li class="{{active_menu('admin-home/prescription/settings')}}">
                            <a href="{{route('admin.prescription.settings')}}">{{__('Settings')}}</a></li>
                    </ul>
                </li>
                <li class="main_dropdown
                    @if(request()->is(['admin-home/services/*','admin-home/services'])) active @endif
                    ">
                        <a href="javascript:void(0)"
                           aria-expanded="true">
                            <i class="ti-headphone-alt"></i>
                            <span>{{__('Services')}}</span>
                        </a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/services')}}"><a
                                    href="{{route('admin.services')}}">{{__('All Services')}}</a></li>
                            <li class="{{active_menu('admin-home/services/new')}}"><a
                                    href="{{route('admin.services.new')}}">{{__('New Service')}}</a></li>
                            <li class="{{active_menu('admin-home/services/category')}}"><a
                                    href="{{route('admin.service.category')}}">{{__('Category')}}</a></li>
                            <li class="{{active_menu('admin-home/services/page-settings')}}"><a
                                    href="{{route('admin.services.page.settings')}}">{{__('Service Page')}}</a></li>
                            <li class="{{active_menu('admin-home/services/single-page-settings')}}"><a
                                    href="{{route('admin.services.single.page.settings')}}">{{__('Service Single Page')}}</a></li>
                        </ul>
                    </li>
                    <li class="main_dropdown
                    {{active_menu('admin-home/products')}}
                    @if(request()->is('admin-home/products/*')) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="ti-gift"></i>
                            <span>{{__('Products Manage')}} <span class="badge">{{$pending_product_order}}</span></span>
                        </a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/products')}}"><a
                                        href="{{route('admin.products.all')}}">{{__('All Products')}}</a></li>
                            <li class="{{active_menu('admin-home/products/new')}}"><a
                                        href="{{route('admin.products.new')}}">{{__('Add New Product')}}</a></li>
                            <li class="{{active_menu('admin-home/products/category')}}"><a
                                        href="{{route('admin.products.category.all')}}">{{__('Category')}}</a></li>
                            <li class="{{active_menu('admin-home/products/shipping')}}"><a
                                        href="{{route('admin.products.shipping.all')}}">{{__('Shipping')}}</a></li>
                            <li class="{{active_menu('admin-home/products/coupon')}}"><a
                                        href="{{route('admin.products.coupon.all')}}">{{__('Coupon')}}</a></li>
                            <li class="{{active_menu('admin-home/products/page-settings')}}"><a
                                        href="{{route('admin.products.page.settings')}}">{{__('Product Page Settings')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/products/single-page-settings')}}"><a
                                        href="{{route('admin.products.single.page.settings')}}">{{__('Product Single Page Settings')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/products/success-page-settings')}}"><a
                                        href="{{route('admin.products.success.page.settings')}}">{{__('Order Success Page Settings')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/products/cancel-page-settings')}}"><a
                                        href="{{route('admin.products.cancel.page.settings')}}">{{__('Order Cancel Page Settings')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/products/order-track-page-settings')}}"><a
                                        href="{{route('admin.products.track.page.settings')}}">{{__('Order Track Page Settings')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/products/product-order-logs')}}"><a
                                        href="{{route('admin.products.order.logs')}}">{{__('Orders')}} <span class="badge">{{$pending_product_order}}</span></a>
                            </li>
                            <li class="{{active_menu('admin-home/products/order-create')}}"><a
                                        href="{{route('admin.product.order.create')}}">{{__('Create Order')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/products/product-ratings')}}"><a
                                        href="{{route('admin.products.ratings')}}">{{__('Ratings')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/products/order-report')}}">
                                <a href="{{route('admin.products.order.report')}}">{{__('Order Report')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/products/tax-settings')}}">
                                <a href="{{route('admin.products.tax.settings')}}">{{__('Tax Settings')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/products/import')}}">
                                <a href="{{route('admin.products.import')}}">{{__('Import')}}</a>
                            </li>
                        </ul>
                    </li>
                <li class=" {{active_menu('admin-home/blog')}}
                            {{active_menu('admin-home/blog-category')}}
                            {{active_menu('admin-home/new-blog')}}
                            {{active_menu('admin-home/blog-page-settings')}}
                            @if(request()->is('admin-home/blog-edit/*')) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-comment-alt"></i>
                            <span>{{__('Blog')}}</span></a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/blog')}} @if(request()->is('admin-home/blog-edit/*')) active @endif"><a
                                        href="{{route('admin.blog')}}">{{__('All Blog')}}</a></li>
                            <li class="{{active_menu('admin-home/blog-category')}}"><a
                                        href="{{route('admin.blog.category')}}">{{__('Category')}}</a></li>
                            <li class="{{active_menu('admin-home/new-blog')}}"><a
                                        href="{{route('admin.blog.new')}}">{{__('Add New Post')}}</a></li>
                            <li class="{{active_menu('admin-home/blog-page-settings')}}"><a 
                                        href="{{route('admin.blog.page')}}" aria-expanded="true">{{__('Blog Page Settings')}}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{active_menu('admin-home/page')}}
                        {{active_menu('admin-home/new-page')}}
                        @if(request()->is('admin-home/page-edit/*')) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                            <span>{{__('Pages')}}</span></a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/page')}} @if(request()->is('admin-home/page-edit/*')) active @endif"><a
                                        href="{{route('admin.page')}}">{{__('All Pages')}}</a></li>
                            <li class="{{active_menu('admin-home/new-page')}}"><a
                                        href="{{route('admin.page.new')}}">{{__('Add New Page')}}</a></li>
                        </ul>
                    </li>
                    {{-- @medheal start--}}
                    
                    <li class="{{active_menu('admin-home/medical-care-info')}}">
                        <a href="{{route('admin.medical.care')}}"><i class="ti-control-forward"></i> <span>{{__('Medical Care Info')}}</span></a>
                    </li>
                    <li class="{{active_menu('admin-home/testimonial')}}">
                        <a href="{{route('admin.testimonial')}}"><i class="ti-control-forward"></i> <span>{{__('Testimonial')}}</span></a>
                    </li>
                    <li class="{{active_menu('admin-home/counterup')}}">
                        <a href="{{route('admin.counterup')}}"><i class="ti-control-forward"></i> <span>{{__('Counterup')}}</span></a>
                    </li>
                    <li class="{{active_menu('admin-home/keyfeatures')}}">
                        <a href="{{route('admin.keyfeatures')}}"><i class="ti-control-forward"></i> <span>{{__('Key Features')}}</span></a>
                    </li>
                    <li class="{{active_menu('admin-home/faq')}}">
                        <a href="{{route('admin.faq')}}"><i class="ti-control-forward"></i> <span>{{__('Faq')}}</span></a>
                    </li>
                    {{-- @medheal end--}}
                    <li class="main_dropdown @if(request()->is([
                            'admin-home/topbar-settings',
                            'admin-home/infobar-settings',
                            'admin-home/navbar-settings',
                            'admin-home/media-upload/page',
                            'admin-home/home-variant',
                            'admin-home/menu',
                            'admin-home/popup-builder/all',
                            'admin-home/widgets',
                            'admin-home/menu-edit/*',
                            'admin-home/form-builder/*',
                        ])) active
                        @endif">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i>
                            <span>{{__('Appearance Settings')}}</span></a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/topbar-settings')}}">
                                <a href="{{route('admin.topbar.settings')}}">
                                    {{__('Topbar Settings')}}
                                </a>
                            </li>
                            <li class="{{active_menu('admin-home/infobar-settings')}}">
                                <a href="{{route('admin.infobar.settings')}}">
                                    {{__('Infobar Settings')}}
                                </a>
                            </li>
                            <li class="{{active_menu('admin-home/navbar-settings')}}">
                                <a href="{{route('admin.navbar.settings')}}"
                                   aria-expanded="true">
                                    {{__('Nabvar Settings')}}
                                </a>
                            </li>
                            <li class="{{active_menu('admin-home/media-upload/page')}}">
                                <a href="{{route('admin.upload.media.images.page')}}"
                                   aria-expanded="true">
                                    {{__('Media Images Manage')}}
                                </a>
                            </li>
                            <li class="{{active_menu('admin-home/home-variant')}}">
                                <a href="{{route('admin.home.variant')}}"
                                   aria-expanded="true">
                                  {{__('Home Variant')}}
                                </a>
                            </li>
                            <li class="main_dropdown @if(request()->is('admin-home/form-builder/*')) active @endif">
                                <a href="javascript:void(0)" aria-expanded="true">
                                    {{__('Form Builder')}}</a>
                                <ul class="collapse">
                                    <li class="{{active_menu('admin-home/form-builder/contact-form')}}">
                                        <a href="{{route('admin.form.builder.contact')}}">{{__('Contact Form')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{active_menu('admin-home/widgets')}}"><a
                                href="{{route('admin.widgets')}}">{{__('Widget Builder')}}</a></li>
                            <li class="{{active_menu('admin-home/menu')}}
                            @if(request()->is('admin-home/menu-edit/*')) active @endif">
                                <a href="{{route('admin.menu')}}">{{__('Menu Manage')}}</a></li>
                            <li class="{{active_menu('admin-home/popup-builder/all')}}">
                                <a href="{{route('admin.popup.builder.all')}}">{{__('Popup Builder')}}</a></li>
                        </ul>
                    </li>
                    <li class="main_dropdown
                        @if(request()->is([
                            'admin-home/home-page/*',
                            'admin-home/about-page/*',
                            'admin-home/contact-page/*',
                            'admin-home/services-page/*',
                            'admin-home/404-page-manage',
                            'admin-home/maintains-page/settings',
                            'admin-home/faq-page-settings',
                        ])) active @endif ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-panel"></i>
                            <span>{{__('All Page Settings')}}</span></a>
                        <ul class="collapse">
                            <li class="main_dropdown  @if(request()->is('admin-home/home-page/*')) active @endif">
                                <a href="javascript:void(0)"
                                   aria-expanded="true">{{__('Home Page Manage')}}
                                </a>
                                <ul class="collapse">
                                    {{-- @MEDHEAL START --}}
                                    @if($home_page_variant_number == '01')
                                    <li class="{{active_menu('admin-home/home-page/header-slider')}}">
                                        <a href="{{route('admin.home.header.slider')}}">{{__('Header Slider')}}</a>
                                    </li>
                                    @else
                                    <li class="{{active_menu('admin-home/home-page/header-slider-static')}}">
                                        <a href="{{route('admin.home.header.slider.static')}}">{{__('Header Slider')}}</a>
                                    </li>
                                    @endif
                                    @if($home_page_variant_number != '02')
                                    <li class="{{active_menu('admin-home/home-page/header-bottom')}}">
                                        <a href="{{route('admin.home.header.bottom')}}">{{__('Header Bottom Area')}}</a>
                                    </li>
                                    @endif
                                    @if($home_page_variant_number == '01')
                                    <li class="{{active_menu('admin-home/home-page/medical-care-info-settings')}}">
                                        <a href="{{route('admin.home.medical.care')}}">{{__('Medical Care Info Area')}}</a>
                                    </li>
                                    @endif
                                    <li class="{{active_menu('admin-home/home-page/testimonial-area-settings')}}">
                                        <a href="{{route('admin.home.testimonial')}}">{{__('Testimonial Area')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/concern-area-settings')}}">
                                        <a href="{{route('admin.home.concern')}}">{{__('Concern Area')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/latest-blog-settings')}}">
                                        <a href="{{route('admin.home.blog.latest')}}">{{__('Latest Blog Area')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/appointment-area-settings')}}">
                                        <a href="{{route('admin.home.appointment')}}">{{__('Appointment Area')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/what-we-do-settings')}}">
                                        <a href="{{route('admin.home.what.we.do')}}">{{__('What We Do Area')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/expert-area-settings')}}">
                                        <a href="{{route('admin.home.expert.area')}}">{{__('Expert Area')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/call-to-us-settings')}}">
                                        <a href="{{route('admin.home.call.to.us')}}">{{__('Call to Us Area')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/special-offer-area-settings')}}">
                                        <a href="{{route('admin.home.special.offer')}}">{{__('Special Offer Area')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/product-by-category-area-settings')}}">
                                        <a href="{{route('admin.home.product.category')}}">{{__('Product Category')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/popular-product-area-settings')}}">
                                        <a href="{{route('admin.home.popular.product')}}">{{__('Popular Product')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/featured-product-area-settings')}}">
                                        <a href="{{route('admin.home.featured.product')}}">{{__('Featured Product')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/best-seller-product-area-settings')}}">
                                        <a href="{{route('admin.home.best.seller.product')}}">{{__('Best Seller Product')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/home-page/section-manage')}}">
                                        <a href="{{route('admin.home.section.manage')}}">{{__('Section Manage')}}</a>
                                    </li>
                                    {{-- @MEDHEAL END --}}
                                </ul>
                            </li>
                            <li class="main_dropdown @if(request()->is('admin-home/about-page/*')  ) active @endif ">
                                <a href="javascript:void(0)" aria-expanded="true">
                                   {{__('About Page Manage')}}
                                </a>
                                <ul class="collapse">
                                    {{-- @medheal --}}
                                    <li class="{{active_menu('admin-home/about-page/concern-area-settings')}}">
                                        <a href="{{route('admin.about.concern')}}">{{__('Concern Area')}}</a></li>
                                    <li class="{{active_menu('admin-home/about-page/progressbar')}}"><a
                                        href="{{route('admin.about.progressbar')}}">{{__('Progressbar Section')}}</a></li>
                                    <li class="{{active_menu('admin-home/about-page/section-manage')}}"><a
                                                href="{{route('admin.about.page.section.manage')}}">{{__('Section Manage')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="main_dropdown @if(request()->is('admin-home/contact-page/*')  ) active @endif">
                                <a href="javascript:void(0)" aria-expanded="true">
                                   {{__('Contact Page Manage')}}
                                </a>
                                <ul class="collapse">
                                    <li class="{{active_menu('admin-home/contact-page/settings')}}">
                                        <a href="{{route('admin.contact.page.settings')}}">{{__('Contact Page')}}</a>
                                    </li>
                                    <li class="{{active_menu('admin-home/contact-page/section-manage')}}">
                                        <a href="{{route('admin.contact.page.section.manage')}}">{{__('Section Manage')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{active_menu('admin-home/faq-page-settings')}}">
                                <a href="{{route('admin.home.faq')}}">{{__('Faq Page')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/404-page-manage')}}">
                                <a href="{{route('admin.404.page.settings')}}">{{__('404 Page Manage')}}</a>
                            </li>
                            <li class="{{active_menu('admin-home/maintains-page/settings')}}">
                                <a href="{{route('admin.maintains.page.settings')}}">{{__('Maintain Page Manage')}}</a>
                            </li>
                        </ul>
                    </li>
                    @if('super_admin' == auth()->guard('admin')->user()->role || 'admin' == auth()->guard('admin')->user()->role)
                        <li class= "@if(request()->is('admin-home/general-settings/*')) active @endif">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                                <span>{{__('General Settings')}}</span></a>
                            <ul class="collapse ">
                                <li class="{{active_menu('admin-home/general-settings/site-identity')}}"><a
                                            href="{{route('admin.general.site.identity')}}">{{__('Site Identity')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/basic-settings')}}"><a
                                            href="{{route('admin.general.basic.settings')}}">{{__('Basic Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/typography-settings')}}"><a
                                            href="{{route('admin.general.typography.settings')}}">{{__('Typography Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/seo-settings')}}"><a
                                            href="{{route('admin.general.seo.settings')}}">{{__('SEO Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/scripts')}}"><a
                                            href="{{route('admin.general.scripts.settings')}}">{{__('Third Party Scripts')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/email-template')}}"><a
                                            href="{{route('admin.general.email.template')}}">{{__('Email Template')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/email-settings')}}"><a
                                            href="{{route('admin.general.email.settings')}}">{{__('Email Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/smtp-settings')}}"><a
                                            href="{{route('admin.general.smtp.settings')}}">{{__('SMTP Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/page-settings')}}"><a
                                            href="{{route('admin.general.page.settings')}}">{{__('Page Settings')}}</a></li>
                                
                                <li class="{{active_menu('admin-home/general-settings/payment-settings')}}"><a
                                             href="{{route('admin.general.payment.settings')}}">{{__('Payment Gateway Settings')}}</a></li>
                                <li class="{{active_menu('admin-home/general-settings/custom-css')}}"><a
                                            href="{{route('admin.general.custom.css')}}">{{__('Custom CSS')}}</a></li>
                                <li class="{{active_menu('admin-home/general-settings/custom-js')}}"><a
                                            href="{{route('admin.general.custom.js')}}">{{__('Custom JS')}}</a></li>
                                <li class="{{active_menu('admin-home/general-settings/gdpr-settings')}}"><a
                                            href="{{route('admin.general.gdpr.settings')}}">{{__('GDPR Compliant Cookies Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/popup-settings')}}"><a
                                            href="{{route('admin.general.popup.settings')}}">{{__('Popup Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/sitemap-settings')}}"><a
                                            href="{{route('admin.general.sitemap.settings')}}">{{__('Sitemap Settings')}}</a>
                                </li>
                                <li class="{{active_menu('admin-home/general-settings/license-setting')}}"><a
                                            href="{{route('admin.general.license.settings')}}">{{__('Licence Settings')}}</a>
                                </li>

                                <li class="{{active_menu('admin-home/general-settings/cache-settings')}}"><a
                                            href="{{route('admin.general.cache.settings')}}">{{__('Cache Settings')}}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="@if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages') ) active @endif">
                            <a href="{{route('admin.languages')}}" aria-expanded="true"><i class="ti-signal"></i>
                                <span>{{__('Languages')}}</span></a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
