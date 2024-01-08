@extends('layouts.app');

@section('content')
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="https://blog.amartha.com/wp-content/uploads/2021/06/kendaraan.jpg"
                class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Nikmati Pengalaman Perjalanan Terbaik bersama
                Rental Kendaraan</h1>
            <p class="lead">Rental Kendaraan menyediakan jasa dan solusi transportasi terbaik untuk memenuhi
                kebutuhan mobilitas bisnis maupun pribadi Anda sehari-hari.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">More</button>
            </div>
        </div>
    </div>
</div>
<div class="container mx-auto">
    <h2 class="text-center">Kendaraan Terbaru Kami</h2>
    <br>
    <div class="row">
        @forelse ($kendaraan as $data)
        <div class="col-md-3">
            <div class="card-sl">
                <form action="{{route('pesan.kendaraan', $data->id)}}" method="post">
                    @csrf
                    <div class="card-image">
                        <img src="{{asset('assets/images/kendaraan/'.$data->image)}}" />
                    </div>
                    <div class="card-heading">
                        <div class="d-flex align-items-baseline">
                            <h3>{{$data->merek}}</h3>
                            <h6>&nbsp;/ {{$data->model}}</h6>
                        </div>
                    </div>
                    <div class="card-text">
                        <div class="d-flex align-items-center">
                            <svg width="10" height="17" viewBox="0 0 330 377" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M320.496 352.84H305.795V17.642C305.795 7.89847 297.896 0 288.153 0H41.1646C31.4211 0 23.5227 7.89847 23.5227 17.642V352.84H8.821C3.9496 352.84 0 356.789 0 361.661V376.362H329.317V361.661C329.317 356.789 325.368 352.84 320.496 352.84ZM94.0906 55.8663C94.0906 50.9949 98.0402 47.0453 102.912 47.0453H132.315C137.186 47.0453 141.136 50.9949 141.136 55.8663V85.2696C141.136 90.141 137.186 94.0906 132.315 94.0906H102.912C98.0402 94.0906 94.0906 90.141 94.0906 85.2696V55.8663ZM94.0906 126.434C94.0906 121.563 98.0402 117.613 102.912 117.613H132.315C137.186 117.613 141.136 121.563 141.136 126.434V155.838C141.136 160.709 137.186 164.659 132.315 164.659H102.912C98.0402 164.659 94.0906 160.709 94.0906 155.838V126.434ZM132.315 235.227H102.912C98.0402 235.227 94.0906 231.277 94.0906 226.406V197.002C94.0906 192.131 98.0402 188.181 102.912 188.181H132.315C137.186 188.181 141.136 192.131 141.136 197.002V226.406C141.136 231.277 137.186 235.227 132.315 235.227ZM188.181 352.84H141.136V291.093C141.136 286.221 145.086 282.272 149.957 282.272H179.36C184.232 282.272 188.181 286.221 188.181 291.093V352.84ZM235.227 226.406C235.227 231.277 231.277 235.227 226.406 235.227H197.002C192.131 235.227 188.181 231.277 188.181 226.406V197.002C188.181 192.131 192.131 188.181 197.002 188.181H226.406C231.277 188.181 235.227 192.131 235.227 197.002V226.406ZM235.227 155.838C235.227 160.709 231.277 164.659 226.406 164.659H197.002C192.131 164.659 188.181 160.709 188.181 155.838V126.434C188.181 121.563 192.131 117.613 197.002 117.613H226.406C231.277 117.613 235.227 121.563 235.227 126.434V155.838ZM235.227 85.2696C235.227 90.141 231.277 94.0906 226.406 94.0906H197.002C192.131 94.0906 188.181 90.141 188.181 85.2696V55.8663C188.181 50.9949 192.131 47.0453 197.002 47.0453H226.406C231.277 47.0453 235.227 50.9949 235.227 55.8663V85.2696Z"
                                    fill="black" />
                            </svg>

                            <p class="p-0 m-0 mx-2">{{$data->cabang->nama_cabang}}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <svg width="10" height="20" viewBox="0 0 330 440" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M147.736 430.231C23.1294 249.587 0 231.048 0 164.659C0 73.7199 73.7199 0 164.659 0C255.597 0 329.317 73.7199 329.317 164.659C329.317 231.048 306.188 249.587 181.581 430.231C173.403 442.043 155.913 442.042 147.736 430.231ZM164.659 233.266C202.55 233.266 233.266 202.55 233.266 164.659C233.266 126.767 202.55 96.0508 164.659 96.0508C126.767 96.0508 96.0508 126.767 96.0508 164.659C96.0508 202.55 126.767 233.266 164.659 233.266Z"
                                    fill="black" />
                            </svg>
                            <p class="p-0 m-0 mx-2">{{$data->cabang->alamat_cabang}}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <svg width="10" height="10" viewBox="0 0 330 330" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M320.611 232.707L248.572 201.833C245.494 200.522 242.074 200.245 238.826 201.046C235.578 201.846 232.678 203.68 230.562 206.271L198.659 245.25C148.59 221.643 108.296 181.349 84.6886 131.28L123.667 99.3763C126.264 97.2646 128.101 94.3643 128.902 91.1147C129.703 87.865 129.423 84.4429 128.105 81.3665L97.2312 9.32713C95.7847 6.0108 93.2264 3.30313 89.9973 1.671C86.7683 0.0388829 83.071 -0.415387 79.5429 0.386525L12.6492 15.8235C9.24774 16.609 6.21293 18.5242 4.04011 21.2566C1.86728 23.989 0.684763 27.3772 0.685547 30.8682C0.685547 195.851 134.409 329.317 299.134 329.317C302.627 329.319 306.016 328.137 308.75 325.964C311.484 323.792 313.4 320.756 314.185 317.353L329.622 250.46C330.419 246.914 329.955 243.202 328.311 239.962C326.666 236.722 323.943 234.157 320.611 232.707Z"
                                    fill="black" />
                            </svg>

                            <p class="p-0 m-0 mx-2">{{$data->cabang->no_telepon_cabang}}</p>
                        </div>
                    </div>
                    <button type="submit" class="card-button"> Pesan Sekarang</button>
                </form>
            </div>
        </div>
        @empty
        <h3 class="text-muted text-center">Mohon Maaf Belum Ada Kendaraan Yang Tersedia.</h3>
        @endforelse
    </div>
</div>
@endsection