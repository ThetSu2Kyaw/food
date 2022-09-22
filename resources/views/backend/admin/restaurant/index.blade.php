<x-layout>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between align-items-center">
                <h4 class="text-white text-capitalize ps-3">Restaurants table</h4>
                <a href="/admin/restaurants/create"> 
                  <button class="btn btn-white text-warning me-3" >Create</button>
                </a>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Currently promotion</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Restaurant Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($restaurants as $rest)

                    <tr>
                      <td class="text-left">
                        <div class="d-flex justify-content-center px-2">
                          <!-- <div>
                            <img src="../assets/img/small-logos/logo-asana.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div> -->
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{$rest->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$rest->phone}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">
                          <img src="/storage/{{$rest->image}}" alt="" width="100" height="100">
                        </span>
                      </td>
                      <td>
                        <div class="text-xs font-weight-bold">
                          @if($rest->is_promotion)
                                <span class="badge bg-danger">active</span>
                          @else
                                <span class="badge bg-primary">inactive</span>
                          @endif
                        </div>
                      </td>
                      <td>
                        @foreach($rest->restaurant_categories as $category)
                            <span class="text-xs font-weight-bold">{{$category->name}}</span>
                        @endforeach
                      </td>
                      <td class="text-center">
                        <div class="d-flex justify-content-center px-2">
                          <!-- <div>
                            <img src="../assets/img/small-logos/logo-asana.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div> -->
                            <a href="/admin/restaurants/{{$rest->id}}">
                              <button class="btn btn-sm bg-warning text-white">Read More</button>
                            </a>
                            <a href="/admin/restaurants/{{$rest->id}}/edit">
                              <button class="btn btn-sm bg-warning text-white ms-2">Edit</button>
                            </a>
                            <form action="/admin/restaurants/{{$rest->id}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm bg-danger text-white ms-2">Delete</button>
                            </form>
                        </div>
                      </td>
                    </tr>

                    @endforeach
                    
                  </tbody>
                  {{$restaurants->links()}}
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>

</x-layout>