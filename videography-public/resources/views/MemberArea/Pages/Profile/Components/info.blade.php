<div class="col-lg-12 col-md-12">
    <div class="card info-card-bg text-white">
        <div class="body profile-header">
            <img src="{{ asset('img/avatar-red.png') }}" class="user_pic rounded img-raised user-profile-image"
                alt="User">
            <div class="detail">
                <div class="u_name">
                    <h4><strong>{{ Auth::user()->name }}</strong></h4>
                    <h6 class="text-lowercase">{{ Auth::user()->email }}</h6>
                    <span>{{ Auth::user()->mobile_no }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
