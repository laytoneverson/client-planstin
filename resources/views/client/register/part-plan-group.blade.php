<!-- ======= Plan Family Start ======= -->

<li class="q"><span>{{ $familyName }}</span><img class="arrow-rotate" src="{{asset('images/arrow.png')}}"></li>
<li class="a" style="display: list-item;">
    <ul class="plans">

        @foreach($plans as $plan)
            @include('client.register.part-plan')
        @endforeach

    </ul>
</li>

<!-- ======= Plan Family End ======= -->
