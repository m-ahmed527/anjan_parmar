@include('includes.web.head')

@if (
    !request()->route()->named('forgot.password') &&
        !request()->route()->named('reset.password') &&
        !request()->route()->named('register') &&
        !request()->route()->named('login') &&
        !request()->route()->named('vendor.register.view'))
    @include('includes.web.header')
@endif

@yield('content')

@if (
    !request()->route()->named('forgot.password') &&
        !request()->route()->named('reset.password') &&
        !request()->route()->named('register') &&
        !request()->route()->named('login') &&
        !request()->route()->named('vendor.register.view'))
    @include('includes.web.footer')
@endif
