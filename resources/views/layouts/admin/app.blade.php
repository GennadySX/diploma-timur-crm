@include('layouts.admin.header')
@include('layouts.admin.sidebar')
@include('layouts.admin.topNav')
<!-- page content -->
<div class="right_col" role="main">
    @yield('content')
</div>
<!-- /page content -->
@include('layouts.admin.footer')
