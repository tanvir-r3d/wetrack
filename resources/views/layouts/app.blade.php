@include('layouts.app_css')
@include('layouts.app_header')
@include('layouts.app_sidebar')
@include('layouts.app_section_header')
<div class="section-body">
@yield('content') 
</div>
@include('layouts.app_footer')
@include('layouts.app_js')
 