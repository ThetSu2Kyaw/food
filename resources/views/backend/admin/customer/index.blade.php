<x-layout>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between">
                <h6 class="text-white text-capitalize ps-3">Customers table</h6>
                <!-- <a href="/admin/orders/create">
                  <button class="btn btn-white text-warning me-3" >Create</button>
                </a> -->
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($customers as $cus)

                    <tr>
                      <td class="text-left">
                        <div class="d-flex justify-content-center align-items-center px-2">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{$cus->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$cus->email}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$cus->phone}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">
                          @if($cus->image)
                            <img src="/storage/{{$cus->image}}" alt="" height="100" width="100" class="rounded">
                          @else
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="" class="rounded" width="100" height="100">
                          @endif
                        </span>
                      </td>
                      
                      <td class="text-center">
                        <div class="d-flex justify-content-start px-2">
                          <!-- <div>
                            <img src="../assets/img/small-logos/logo-asana.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div> -->
                            <a href="/admin/customers/{{$cus->id}}">
                              <button class="btn btn-sm bg-warning text-white position-relative" style="top: 8px;">Read More</button>
                            </a>
                           
                        </div>
                      </td>
                    </tr>

                    @endforeach
                    
                  </tbody>
                  {{$customers->links()}}
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>

</x-layout>