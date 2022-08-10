<form action="{{ route('categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="inp_name"><b>Name</b> </label>
                <input id="inp_name" value="{{ $category->name }}" class="form-control form-control-alternative" type="text" placeholder="Enter Category Name"
                    name="name" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label class="form-control-label">Description</label>
                    <textarea name="description" rows="5"
                        class="form-control form-control-alternative"
                        id="description" required>{{ $category->description }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <h6 class="text-center responsive-mobile">
                    <button id="submit-btn" type="submit" class="btn btn-info">
                        Update Category
                    </button>
                </h6>
            </div>
        </div>
    </div>
</form>
