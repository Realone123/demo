@php
    $setting = App\Setting::first();
@endphp

<style>
.wsus__topbar,
.common_btn,
.login_icon a:hover,
.wsus__single_property_img .rent,
.wsus__single_property_text .tk,
.wsus__popular_text ul li,
.wsus__scroll_btn,
.wsus__blog_text .comment,
.wsus__testimonial .prv_arr,
.wsus__testimonial .nxt_arr,
.wsus__search_property h3,
.common_btn2:hover,
.wsus__footer_content .address i,
.wsus__footer_content .call_mail i,
.pro_det_slider .slick-dots li.slick-active button,
.wsus__single_det_top .tk,
.wsus__single_det_top .sale,
.wsus__single_det_top .rent,
.wsus__pro_det_top_rating span,
.list_view .rent,
.list_view .sale,
.wsus__round_area,
.razorpay-payment-button,
.wsus__search_categoy ul li a span,
.wsus__my_property .actions ul li a {
    background: {{ $setting->theme_one }} !important;
}

.wsus__footer_content form button:hover{
    background: #24324a;
}

.wsus__single_property_search_check .form-check-input:checked,
.dash_aminities .form-check-input:checked {
	background-color: {{ $setting->theme_one }} !important;
	border-color: {{ $setting->theme_one }} !important;
}

.nav-pills .nav-link.active,
.nav-pills .nav-link:hover,
.wsus__pagination .page-link:hover,
.wsus__pagination .page-link.active {
    background-color: {{ $setting->theme_one }} !important;
}

.wsus__banner .slick-dots li.slick-active button,
.wsus__testimonial .slick-dots li.slick-active button {
    background: {{ $setting->theme_one }} !important;
}

.wsus__banner .slick-dots li button, .wsus__testimonial .slick-dots li button {
    border: 1px solid {{ $setting->theme_one }} !important;
}

.wsus__topbar_right li a:hover,
.main_menu .navbar-nav .nav-item:hover .nav-link,
.main_menu .navbar-nav .nav-item .nav-link.active,
.wsus__single_property_text .title:hover,
.wsus__single_property_footer .category,
.wsus__top_properties_text p,
.wsus__top_properties_text a:hover,
.wsus__top_properties_text p span,
.wsus__single_service i,
.wsus__single_team .title:hover,
.wsus__blog_text .blog_title:hover,
.wsus__testi_text h5,
.footer_link li a:hover,
.wsus__property_topbar .nav-pills button,
.wsus__single_details .list li a i,
.wsus__main_agent_address a:hover,
.wsus__agent_img h5,
.wsus__deshboard_menu li a:hover,
.wsus__deshboard_menu li a.dash_active,
.wsus__deshboard_menu li a i,
.wsus__dash_info_text a i,
.wsus__dash_info_text p i,
.wsus__dash_info_text a:hover {
    color: {{ $setting->theme_one }} !important;
}

.breadcrumb-item.active{
    color: #fff !important;
}

.wsus__single_property_footer .category:hover{
	color: #0A547A !important;
}


.main_menu .dropdown-menu li a:hover,
.main_menu .dropdown-menu li a.active  {
	color: #fff;
    background-color: {{ $setting->theme_one }} !important;;
}


.wsus__single_team_img .team_link li a {
    background: {{ $setting->theme_one }} !important;
	color: #fff !important;
}

.wsus__single_team_img .team_link li a:hover{
	background: #fff !important;
	color: {{ $setting->theme_one }} !important;
}


.wsus__property_topbar .nav-pills .nav-link:hover {
	color: #fff !important;
	background-color: {{ $setting->theme_one }} !important;
}

.wsus__property_topbar .nav-pills .nav-link.active {
	color: {{ $setting->theme_one }} !important;
	background-color: #fff !important;
}

.wsus__blog_det_img p {
    background: #f02c2dbf;
}   

/* theme two */

.wsus__banner_text,
.wsus__banner_search {
    background: {{ $setting->theme_two }} !important;
    opacity: .85;
}

.select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
    background-color: {{ $setting->theme_two }} !important;
}

.common_btn:hover,
.login_icon a,
.wsus__single_property_img .sale,
.wsus__blog_text .blog_date span,
.common_btn2,
.pro_det_slider .slick-dots li button,
.wsus__total_rating,
.list_view .sale,
.wsus__quick_contact h4,
.wsus__checkout h5,
.wsus__my_property .actions ul li a:hover,
.wsus__message_icon a.edit:hover {
    background: {{ $setting->theme_two }} !important;
}

.wsus__about_counter_icon {
    background: {{ $setting->theme_two }} !important;
    opacity: .85;
}

.wsus__services_overlay {
    background: {{ $setting->theme_two."80" }} !important;
}

.wsus__single_team_img .team_link {
    background: {{ $setting->theme_two."70" }} !important;
}


</style>

