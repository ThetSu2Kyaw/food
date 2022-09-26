<x-layout>
     <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100">
      <span class="mask bg-transparent opacity-6"></span>
      <div class="container mt-2">
        <div class="row">
            <h5 class="text-center mb-3">Create Admin</h5>
          <div class="col-lg-8 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-body mt-2">
                <form class="text-start p-2" action="/admin/addAdmin/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Name</label>
                      <input type="text" class="form-control" name="name">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Profile</label>
                      <input type="file" class="form-control" name="profile">
                    </div>
                    <div class="input-group input-group-static is-invalid mb-4">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password">
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