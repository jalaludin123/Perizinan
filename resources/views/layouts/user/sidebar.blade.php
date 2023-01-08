<div class="slider" id="sliders">
    <div class="slider-head">
        <div class="d-block pt-4 pb-3 px-3">
            <img src="{{ asset('darkpan-1.0.0/img/testimonial-1.jpg') }}" alt="user" class="slider-img-user mb-2" />
            <p class="fw-bold mb-0 lh-1 text-white">{{ Auth::user()->name }}</p>
            <small class="text-white">{{ Auth::user()->email }}</small>
        </div>
    </div>
    <div class="slider-body px-1">
        <nav class="nav flex-column">
            <a class="nav-link px-3 active" href="{{ url('/home') }}"> <i class="fa fa-home fa-lg box-icon"
                    aria-hidden="true"></i>Home </a>
            <hr class="soft my-1 bg-white" />
            <a class="nav-link px-3" href="{{ url('dataPermohonan/' . Auth::user()->pendaftaran->id) }}"> <i
                    class="fa fa-calendar fa-lg box-icon" aria-hidden="true"></i>Data Permohonan </a>
        </nav>
    </div>
</div>
