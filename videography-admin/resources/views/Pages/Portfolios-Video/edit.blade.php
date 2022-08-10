<form action="{{ route('portfolios.video.update',$video->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="inp_name"><b>Name</b> </label>
                <input id="inp_name" value="{{ $video->name }}" class="form-control form-control-alternative" type="text" placeholder="Enter video Name"
                    name="name" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="inp_name"><b>Link</b> </label>
                <input id="inp_name" value="{{ $video->link }}" class="form-control form-control-alternative" type="text" placeholder="Enter video Link"
                    name="link" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="customer_id"><b>Category </b> </label>
                <select class="form-control select2" name="category_id" id="select-categories-edit" required>
                    <option value=""></option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $video->category_id == $category->id ? 'selected' : '' }}>
                        {{$category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <h6 class="text-center responsive-mobile">
                    <button id="submit-btn" type="submit" class="btn btn-info">
                        Update video
                    </button>
                </h6>
            </div>
        </div>
    </div>
</form>
