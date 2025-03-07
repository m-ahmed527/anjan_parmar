@include('includes.web.head')

@if (
    !request()->route()->named('web.forgot.password') &&
        !request()->route()->named('web.reset.password') &&
        !request()->route()->named('web.register') &&
        !request()->route()->named('web.login') &&
        !request()->route()->named('web.vendor.register.view'))
    @include('includes.web.header')
@endif

@yield('content')

@if (
    !request()->route()->named('web.forgot.password') &&
        !request()->route()->named('web.reset.password') &&
        !request()->route()->named('web.register') &&
        !request()->route()->named('web.login') &&
        !request()->route()->named('web.vendor.register.view'))
    @include('includes.web.footer')
@endif
