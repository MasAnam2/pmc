<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ $title }}</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    @include('layouts.link-rel')
</head>

<body class="theme-red">
    {{-- @include('layouts.page-loader') --}}
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    @include('layouts.topbar')
    <section>
        @include('layouts.leftbar')
        @include('layouts.rightbar')
    </section>

    @yield('content')

    @include('layouts.js')
    <script>
        function setSkin(){
            var skin = window.localStorage.getItem('skin') || 'red';
            $('body').attr('class', '').addClass('theme-'+skin);
            $('[data-theme="'+skin+'"]').addClass('active');
        }
        setSkin();
        $('.demo-choose-skin>li').on('click', function(e){
            var skin = $(this).data('theme');
            // $.ajax({
            //     url : '{{ route('pengaturan.set_skin') }}',
            //     type : 'POST',
            //     data : {
            //         skin : skin,
            //         _token : '{{ csrf_token() }}'
            //     },
            //     success : function(res){
            //     }
            // })
            window.localStorage.setItem('skin', skin)
        });
        $(document).ready(function(e){
            setTimeout(function(){
                setSkinListHeightAndScroll();
            }, 2000);
        });
    </script>
</body>

</html>