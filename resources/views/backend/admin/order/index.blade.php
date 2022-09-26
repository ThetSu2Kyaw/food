<x-layout>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between">
                <h6 class="text-white text-capitalize ps-3">Orders table</h6>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Customer Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Restaurant Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Is Finish</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Remark</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)

                    <tr>
                      <td class="text-left">
                        <div class="d-flex justify-content-center align-items-center px-2">
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{$order->customer->name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$order->restaurant->name}}</span>
                      </td>
                      <td>
                        <div class="text-xs font-weight-bold">
                          @if($order->is_finish)  
                                <span class="badge bg-success">Finished</span>
                          @else
                                <span class="badge bg-danger">Not Finished</span>
                          @endif
                        </div>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$order->remark}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$order->created_at->diffForHumans()}}</span>
                      </td>
                      <td class="text-center">
                        <div class="d-flex justify-content-center px-2">
                          <!-- <div>
                            <img src="../assets/img/small-logos/logo-asana.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div> -->
                            <a href="/admin/orders/{{$order->id}}">
                              <button class="btn btn-sm bg-warning text-white position-relative" style="top: 8px;">Read More</button>
                            </a>
                            <!-- <a href="/admin/orders/{{$order->id}}/edit">
                              <button class="btn btn-sm bg-warning text-white ms-2 position-relative" style="top: 8px;">Edit</button>
                            </a> -->
                            <!-- <form action="/admin/orders/{{$order->id}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm bg-danger text-white ms-2 position-relative" style="top: 8px;">Delete</button>
                            </form> -->
                        </div>
                      </td>
                    </tr>

                    @endforeach
                    
                  </tbody>
                  {{$orders->links()}}
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>

</x-layout>