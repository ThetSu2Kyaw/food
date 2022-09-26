<x-layout>

<div class="container-fluid py-4">
      <div class="row">
          @if(session('success'))
              <div class="alert alert-success my-3 text-center text-white">{{session('success')}}</div>
          @endif
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between align-items-center">
                <h4 class="text-white text-capitalize ps-3">Menus table</h4>
                <a href="/admin/menus/create"><button class="btn btn-white text-warning me-3" >Create</button></a>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Restaurant</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($menus as $menu)

                    <tr>
                      <td class="text-left">
                        <div class="d-flex justify-content-center align-items-center px-2">
                          <!-- <div>
                            <img src="../assets/img/small-logos/logo-asana.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div> -->
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{$menu->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{$menu->menuCategory->name}}</p>
                      </td>
                      <!-- <td>
                        <span class="text-xs font-weight-bold">{{$menu->description}}</span>
                      </td> -->
                      <td>
                        <span class="text-xs font-weight-bold">{{$menu->price}}</span>
                      </td>
                      <td>
                        
                        <!-- <span class="text-xs font-weight-bold"> -->
                          <img src='{{"/storage/$menu->image"}}' alt="" height="100" width="100" class="rounded">
                        <!-- </span> -->
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$menu->restaurant->name}}</span>
                      </td>
                      <td class="text-center">
                        <div class="d-flex justify-content-center px-2">
                          <!-- <div>
                            <img src="../assets/img/small-logos/logo-asana.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div> -->
                            <a href="/admin/menus/{{$menu->id}}">
                              <button class="btn btn-sm bg-warning text-white position-relative" style="top: 8px;">Read More</button>
                            </a>
                            <a href="/admin/menus/{{$menu->id}}/edit">
                              <button class="btn btn-sm bg-warning text-white ms-2 position-relative" style="top: 8px;">Edit</button>
                            </a>
                            <form action="/admin/menus/{{$menu->id}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm bg-danger text-white ms-2 position-relative" style="top: 8px;">Delete</button>
                            </form>
                        </div>
                      </td>
                    </tr>

                    @endforeach
                    
                  </tbody>
                    
                </table>
                {{$menus->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>

</x-layout>