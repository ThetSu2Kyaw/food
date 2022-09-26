<x-layout>
     <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100">
      <span class="mask bg-transparent opacity-6"></span>
      <div class="container mt-2">
        <div class="row">
            <h5 class="text-center mb-3">Create Order</h5>
          <div class="col-lg-8 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-body mt-2">
                <form class="text-start p-2" action="/admin/orders/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="category" class="ms-0 mb-2">Menu Category</label>
                      <select class="form-control" id="category" name="menu_category_id">
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="input-group input-group-dynamic is-invalid mb-4">
                      <textarea class="form-control" rows="5" placeholder="Description" spellcheck="false" name="description"></textarea>
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Price</label>
                      <input type="text" class="form-control" name="price">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Image</label>
                      <input type="file" class="form-control" name="image">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label for="restaurant" class="ms-0 mb-2">Restaurant</label>
                      <select class="form-control" id="restaurant" name="restaurant_id">
                        @foreach($restaurants as $rest)
                            <option value="{{$rest->id}}">{{$rest->name}}</option>
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