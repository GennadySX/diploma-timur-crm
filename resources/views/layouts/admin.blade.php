@include('layouts.admin.header')
@include('layouts.admin.sidebar')
<section id="main-content">
    <section class="wrapper">
            @yield('content')
    </section>
</section>
@include('layouts.admin.footer')
