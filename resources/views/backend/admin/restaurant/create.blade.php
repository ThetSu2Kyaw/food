<x-layout>
     <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100">
      <span class="mask bg-transparent opacity-6"></span>
      <div class="container mt-2">
        <div class="row">
            <h5 class="text-center mb-3">Create Restaurant</h5>
          <div class="col-lg-8 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-body mt-2">
                <form class="text-start p-2" action="/admin/restaurants/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <div class="input-group input-group-dynamic is-invalid mb-4">
                      <textarea class="form-control" rows="5" placeholder="Description" spellcheck="false" name="address"></textarea>
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Phone</label>
                      <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Image</label>
                      <input type="file" class="form-control" name="image">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="is_open" class="ms-0 mb-2">Is open</label>
                      <select class="form-control" id="is_open" name="is_open">
                          <option value="1">open</option>
                          <option value="0">close</option>
                      </select>
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="is_promotion" class="ms-0 mb-2">Is promotion</label>
                      <select class="form-control" id="is_promotion" name="is_promotion">
                          <option value="1">active</option>
                          <option value="0">inactive</option>
                      </select>
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="restaurant_category_id" class="ms-0 mb-2">Restaurant Category</label>
                      <select class="form-control" id="restaurant_category_id" name="restaurant_category_id">
                         @foreach($rest_categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                         @endforeach
                      </select>
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="township_id" class="ms-0 mb-2">Restaurant Category</label>
                      <select class="form-control" id="township_id" name="township_id">
                         @foreach($townships as $township)
                            <option value="{{$township->id}}">{{$township->name}}</option>
                         @endforeach
                      </select>
                    </div>
                    <div>
                      <button class="btn btn-danger btn-lg w-100 mt-2">Create</button>
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