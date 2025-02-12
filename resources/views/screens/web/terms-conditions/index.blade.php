@extends('layouts.web.app')


@section('content')
<style>
    .sub-heading-shipping{
        margin-bottom: 10px;
    }
</style>
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Terms & Condition</h1>
                        <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Terms & Condition</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid my-5 sh-space">
            <div class="row">
                <div class="col-12">
                    <h2 class="sub-heading-shipping mb-4">
                        Site Usage:
                    </h2>
                    <p class="shipping-para mb-4">
                        Facilisi etiam dignissim diam quis enim lobortis. Nulla malesuada pellentesque elit eget gravida cum
                        faucibus. Suspendisse viverra, odio sit amet accumsan mattis, eos libero malesuada enim, quis
                        feugiat lorem lectus eget nulla. Aenean vestibulum sapien ex, quis varius elit auctor id. Proin at
                        metus eget dolor accumsan tempor eu at tellus. Sed pulvinar leo in justo fermentum, a euismod mi
                        vehicula. Curabitur a sollicitudin tellus, at fermentum nisl. Integer at dictum purus. In hac
                        habitasse platea dictumst. Phasellus faucibus ultrices convallis. Praesent blandit nisl at mauris
                        auctor, vulputate tempus mi mollis. Morbi sit amet laoreet odio. Vivamus aliquet magna mauris, nec
                        vestibulum justo aliquam eu.
                    </p>
                    <h2 class="sub-heading-shipping mb-4">
                        liability limitations:
                    </h2>
                    <p class="shipping-para mb-4">
                        Suspendisse viverra, odio sit amet accumsan mattis, eos libero malesuada enim, quis feugiat lorem
                        lectus eget nulla. Aenean vestibulum sapien ex, quis varius elit auctor id. Proin at metus eget
                        dolor accumsan tempor eu at tellus. Sed pulvinar leo in justo fermentum, a euismod mi vehicula.
                    </p>
                    <ul class="lists-shipping mb-4">
                        <li class="shipping-para">Cras adipiscing enim eu turpis egestas Proin at metus eget dolor accumsan
                            tempor pretium aenean Fonsectetur adipiscing sit.</li>
                        <li class="shipping-para">
                            Egestas egestas fringilla at fermentum nisl. Integer at dictum purus phasellus faucibus
                            scelerisque Zamper auctor neque.
                        </li>
                        <li class="shipping-para">
                            Morbi enim nunc faucibus a sed iaculis sapien consectetur in pellentesque sit amet porttios Id
                            volutpat lacus Iaculis.
                        </li>
                        <li class="shipping-para">
                            Sed enim ligula, facilisis sed lacinia sed, aliquet magna nec justo aliquam eu volutpat
                            scelerisque nisl, Aenean posuere nec.
                        </li>
                    </ul>
                    <h2 class="sub-heading-shipping mb-4">
                        User Agreement:
                    </h2>
                    <p class="shipping-para mb-4">
                        Ut dapibus dui quis elit elementum, vulputate eleifend turpis dignissim. Sed eleifend enim et
                        pulvinar feugiat. In sit amet sapien et turpis convallis scelerisque vel in mi. Donec turpis nibh,
                        posuere ac feugiat sed, ultrices nec mauris. Vestibulum ullamcorper dignissim ex, fringilla mattis
                        libero iaculis ut. Cras at tristique turpis. Pellentesque maximus metus ut sem faucibus auctor.
                        Proin vitae leo tincidunt, placerat ligula egestas, feugiat leo. Mauris at orci id sem scelerisque
                        vehicula. Mauris quam ligula, euismod vel nisi feugiat, suscipit aliquam risus. Cras bibendum lacus
                        a diam eleifend, sed vehicula augue cursus.
                    </p>
                    <ul class="lists-shipping mb-4">
                        <li class="shipping-para">Cras adipiscing enim eu turpis egestas Proin at metus eget dolor accumsan
                            tempor pretium aenean Fonsectetur adipiscing sit.</li>
                        <li class="shipping-para">
                            Egestas egestas fringilla at fermentum nisl. Integer at dictum purus phasellus faucibus
                            scelerisque Zamper auctor neque.
                        </li>
                        <li class="shipping-para">
                            Morbi enim nunc faucibus a sed iaculis sapien consectetur in pellentesque sit amet porttios Id
                            volutpat lacus Iaculis.
                        </li>
                        <li class="shipping-para">
                            Sed enim ligula, facilisis sed lacinia sed, aliquet magna nec justo aliquam eu volutpat
                            scelerisque nisl, Aenean posuere nec.
                        </li>
                    </ul>
                    <h2 class="sub-heading-shipping mb-4">
                        Refund and Cancellation:
                    </h2>
                    <p class="shipping-para mb-4">
                        Sed eleifend enim et pulvinar feugiat. In sit amet sapien et turpis convallis scelerisque vel in mi.
                        Donec turpis nibh, posuere ac feugiat sed, ultrices nec mauris. Vestibulum ullamcorper dignissim ex,
                        fringilla mattis libero iaculis ut. Cras at tristique turpis. Pellentesque faucibus auctor. Proin
                        vitae leo tincidunt, placerat ligula egestas, feugiat leo. Mauris at orci id sem scelerisque
                        vehicula. Mauris quam ligula, euismod vel nisi feugiat, suscipit aliquam risus. Cras bibendum lacus
                        a diam eleifend.
                    </p>
                    <h2 class="sub-heading-shipping mb-4">
                        Invoice and Payment:
                    </h2>
                    <p class="shipping-para mb-4">
                        Proin at metus eget dolor accumsan tempor eu at tellus. Sed pulvinar leo in justo fermentum, a
                        euismod mi vehicula. Curabitur a sollicitudin tellus, at fermentum nisl. Integer at dictum purus. In
                        hac habitasse platea dictumst. Phasellus faucibus ultrices convallis. Praesent blandit nisl at
                        mauris auctor, vulputate tempus mi mollis. Morbi sit amet laoreet odio. </p>
                    <ul class="lists-shipping mb-4">
                        <li class="shipping-para">Cras adipiscing enim eu turpis egestas Proin at metus eget dolor accumsan
                            tempor pretium aenean Fonsectetur adipiscing sit.</li>
                        <li class="shipping-para">
                            Egestas egestas fringilla at fermentum nisl. Integer at dictum purus phasellus faucibus
                            scelerisque Zamper auctor neque.
                        </li>
                        <li class="shipping-para">
                            Morbi enim nunc faucibus a sed iaculis sapien consectetur in pellentesque sit amet porttios Id
                            volutpat lacus Iaculis.
                        </li>
                        <li class="shipping-para">
                            Sed enim ligula, facilisis sed lacinia sed, aliquet magna nec justo aliquam eu volutpat
                            scelerisque nisl, Aenean posuere nec.
                        </li>
                    </ul>
                    <h2 class="sub-heading-shipping mb-4">
                        Copyright:
                    </h2>
                    <p class="shipping-para mb-4">
                        Proin at metus eget dolor accumsan tempor eu at tellus. Sed pulvinar leo in justo fermentum, a
                        euismod a sollicitudin tellus, at fermentum nisl. Integer at dictum purus. In hac habitasse platea
                        dictumst. Phasellus faucibus ultrices convallis.
                    </p>
                    <h2 class="sub-heading-shipping">
                        Additional Privacy Details:
                    </h2>
                    <p class="shipping-para mb-4">
                        Facilisi etiam dignissim diam quis enim lobortis. Nulla malesuada pellentesque elit eget gravida cum
                        faucibus. Suspendisse viverra, odio sit amet accumsan mattis, eos libero malesuada enim, quis
                        feugiat lorem lectus eget nulla. Aenean vestibulum sapien ex, quis varius elit auctor id. Proin at
                        metus eget dolor accumsan tempor eu at tellus. Sed pulvinar leo in justo fermentum, a euismod mi
                        vehicula. Curabitur a sollicitudin tellus, at fermentum nisl. Integer at dictum purus. In hac
                        habitasse platea dictumst. Phasellus faucibus ultrices convallis. Praesent blandit nisl at mauris
                        auctor, vulputate tempus mi mollis. Morbi sit amet laoreet odio. Vivamus aliquet magna mauris, nec
                        vestibulum justo aliquam eu. </p>
                    <ul class="lists-shipping mb-4">
                        <li class="shipping-para">Cras adipiscing enim eu turpis egestas Proin at metus eget dolor accumsan
                            tempor pretium aenean Fonsectetur adipiscing sit.</li>
                        <li class="shipping-para">
                            Egestas egestas fringilla at fermentum nisl. Integer at dictum purus phasellus faucibus
                            scelerisque Zamper auctor neque.
                        </li>
                        <li class="shipping-para">
                            Morbi enim nunc faucibus a sed iaculis sapien consectetur in pellentesque sit amet porttios Id
                            volutpat lacus Iaculis.
                        </li>
                    </ul>
                    <h2 class="sub-heading-shipping mb-4">
                        Reaching Out:
                    </h2>
                    <p class="shipping-para mb-4">
                        Nulla malesuada pellentesque elit eget gravida cum faucibus. Suspendisse viverra, odio sit amet
                        accumsan mattis, eos libero malesuada enim, quis feugiat lorem lectus eget nulla. Aenean vestibulum
                        sapien ex, quis varius elit auctor id. Proin </p>
                    <ul class="lists-shipping mb-4">
                        <li class="shipping-para">+321-978-3993</li>
                        <li class="shipping-para">
                            sealoffer@outlook.com </li>
                    </ul>
                </div>
            </div>
        </div>

    </main>
@endsection
