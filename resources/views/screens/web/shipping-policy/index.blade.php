@extends('layouts.web.app')

@section('content')
    <main>

        <div class="shop-banner-section">
            <div class="container-fluid px-4">
                <div class="shop-banner">
                    <div>
                        <h1 class="sh-head">Shipping</h1>
                        <p class="sh-para"><a href="{{ route('index') }}" class="text-decoration-none">Home</a> / Shipping</p>
                    </div>
                </div>
            </div>

        </div>


        <div class="container-fluid my-5 sh-space">
            <div class="row">
                <div class="col-12">
                    <h2 class="sub-heading-shipping mb-4">
                        Shipping policy:
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
                        Return policy:
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
                        Order status and tracking:
                    </h2>
                    <p class="shipping-para mb-4">
                        Dictum sit amet justo donec enim diam vulputate. Convallis tellus id interdum velit laoreet id.In
                        sit amet sapien et turpis convallis scelerisque vel in mi. Donec turpis nibh, posuere ac feugiat
                        sed, ultrices nec mauris. Vestibulum ullamcorper dignissim ex, fringilla mattis libero iaculis ut.
                        Cras at tristique turpis. Pellentesque maximus metus ut sem faucibus auctor. Proin vitae leo
                        tincidunt, placerat ligula egestas, feugiat leo. Mauris at orci id sem scelerisque vehicula. Mauris
                        quam ligula, euismod vel nisi feugiat, suscipit aliquam risus.
                    </p>
                    <div class="table-container mt-5">
                        <table class="table-shipping">
                            <thead>
                                <tr>
                                    <th>Shipping method</th>
                                    <th>Shipping Time</th>
                                    <th>Shipping Free</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Standard</td>
                                    <td>2-3 Working Days</td>
                                    <td>$10 or Free Ship on orders $150+ </td>
                                </tr>
                                <tr>
                                    <td>Premium</td>
                                    <td>1 Working Day</td>
                                    <td>Additional $20</td>
                                </tr>
                                <tr>
                                    <td>One-Day</td>
                                    <td>12 Hours</td>
                                    <td>Additional $40</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
