<x-layout>
     <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100">
      <span class="mask bg-transparent opacity-6"></span>
      <div class="container mt-2">
        <div class="row">
            <h5 class="text-center mb-3">Create Menu</h5>
          <div class="col-lg-8 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-body mt-2">
                <form class="text-start p-2" action="/admin/menus/store" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Category</label> -->
                    <!-- <input type="password" class="form-control"> -->
                    <select name="menu_category_id" class="form-control">
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Description</label> -->
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Image</label> -->
                    <input type="file" class="form-control" name="image">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Restaurant</label> -->
                    <select name="restaurant_id" class="form-control">
                        @foreach($restaurants as $rest)
                            <option value="{{$rest->id}}">{{$rest->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-primary text-white w-100 my-4 mb-2">
                        Create
                    </button>
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