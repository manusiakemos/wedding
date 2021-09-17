<section id="home" class="d-flex align-items-center justify-content-center">
    <div style="
        min-height: 100vh;
        overflow-x: hidden;
        width: 100%;
        background-size: contain;
        background: url('{!! $cover_image !!}') no-repeat center;
        filter: brightness(.7) blur(4px);
        position: absolute;
        left: 0;
        top: 0;
        z-index: -1"></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <h1 class="text-handwrite text-white text-capitalize text-center display-4">
                            {{$meta['brides']['male']['nickname']}} & {{$meta['brides']['female']['nickname']}}
                        </h1>
                        <div class="text-center">
                            <small class="text-white text-center">
                                Dan segala sesuatu Kami ciptakan berpasang-pasangan supaya kamu mengingat kebesaran
                                Allah
                            </small>
                        </div>
                        <div class="text-center">
                            <small class="text-white text-center">
                                (QS. AZ-ZARIYAT : 49)
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center align-items-center mt-4" v-if="status" id="countdown"
             v-cloak>
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center flex-column mb-3" v-for="v in cd">
                    <div class="countdown-item d-flex justify-content-center align-items-center flex-column">
                        <div class="justify-content-center">
                            <span class="fs-1 fw-bold font-weight-bolder">@{{ v.value }}</span>
                        </div>
                        <div class="justify-content-center">
                            <span>@{{ v.key }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center w-100">
                    @include("themes.{$invitation->theme->key}.includes._scroll")
                </div>
            </div>
        </div>
    </div>
</section>

@push("script")
    <script src="{{asset('vendor/crudgen/libs/etc/moment.min.js')}}"></script>
    <script>
        var counter = new Vue({
            el: "#countdown",
            data: {
                status: false,
                cd: [
                    {
                        key: "hari",
                        value: 0,
                    },
                    {
                        key: "jam",
                        value: 0,
                    },
                    {
                        key: "menit",
                        value: 0,
                    },
                    {
                        key: "detik",
                        value: 0,
                    }
                ]
            },
            mounted() {
                this.setDate();
            },
            methods: {
                setDate() {
                    var dt = document.querySelector('meta[name="countdown-until"]').content;
                    var vm = this;
                    var x = setInterval(function () {


                        var a = moment(dt);
                        var b = moment();

                        var distance = a.diff(b).valueOf();

                        if (distance <= 0) {
                            clearInterval(x);
                            vm.status = false;
                            vm.cd[0].value = 0;
                            vm.cd[1].value = 0;
                            vm.cd[2].value = 0;
                            vm.cd[3].value = 0;
                        } else {
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            vm.status = true;
                            vm.cd[0].value = days;
                            vm.cd[1].value = hours;
                            vm.cd[2].value = minutes;
                            vm.cd[3].value = seconds;
                        }
                    }, 1000);
                }
            }
        });
    </script>
@endpush
