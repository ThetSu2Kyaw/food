<x-layout>
     <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100">
      <span class="mask bg-transparent opacity-6"></span>
      <div class="container mt-2">
        <div class="row">
            <h5 class="text-center mb-3">Edit Restaurant</h5>
          <div class="col-lg-8 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-body mt-2">
                <form class="text-start p-2" action="/admin/restaurants/{{$rest->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name" value="{{$rest->name}}">
                    </div>
                    <div class="input-group input-group-dynamic is-invalid mb-4">
                      <textarea class="form-control" rows="5" placeholder="Description" spellcheck="false" name="address">{{$rest->address}}</textarea>
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="phone" value="{{$rest->phone}}">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Image</label>
                      <input type="file" class="form-control" name="image">
                      <img src="/storage/{{$rest->image}}" height="100" width="100" class="rounded mt-3">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="is_open" class="ms-0 mb-2">Is open</label>
                      <select class="form-control" id="is_open" name="is_open">
                          <option value="1" {{$rest->is_open == 1? 'selected': ''}}>open</option>
                          <option value="0" {{$rest->is_open == 0? 'selected': ''}}>close</option>
                      </select>
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="is_promotion" class="ms-0 mb-2">Is promotion</label>
                      <select class="form-control" id="is_promotion" name="is_promotion">
                          <option value="1" {{$rest->is_promotion == 1? 'selected': ''}}>active</option>
                          <option value="0" {{$rest->is_promotion == 0? 'selected': ''}}>inactive</option>
                      </select>
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="restaurant_category_id" class="ms-0 mb-2">Restaurant Category</label>
                      <select class="form-control" id="restaurant_category_id" name="restaurant_category_id">
                         @foreach($rest_categories as $cat)
                            <option value="{{$cat->id}}" {{$cat->id == $rest->restaurant_category_id? 'selected': ''}}>{{$cat->name}}</option>
                         @endforeach
                      </select>
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="township_id" class="ms-0 mb-2">Restaurant Category</label>
                      <select class="form-control" id="township_id" name="township_id">
                         @foreach($townships as $township)
                            <option value="{{$township->id}}" {{$township->id == $rest->township_id? 'selected': ''}}>{{$township->name}}</option>
                         @endforeach
                      </select>
                    </div>
                    <div>
                      <button class="btn btn-danger btn-lg w-100 mt-2">Update</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</x-layout>