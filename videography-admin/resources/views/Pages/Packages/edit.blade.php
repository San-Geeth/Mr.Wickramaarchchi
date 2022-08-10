<form action="{{ route('packages.update',$package->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="inp_name"><b>Name</b> </label>
                <input id="inp_name" value="{{ $package->name }}" class="form-control form-control-alternative" type="text" placeholder="Enter package Name"
                    name="name" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <h6 class="text-center responsive-mobile">
                    <button id="submit-btn" type="submit" class="btn btn-info">
                        Update package
                    </button>
                </h6>
            </div>
        </div>
    </div>
</form>
