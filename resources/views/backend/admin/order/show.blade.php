<x-layout>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between align-items-center">
                  <h4 class="my-2 text-center ms-3 text-white">Order Detail</h4>
                  <a href="/admin/orders"><button class="btn btn-white me-3 mt-2 text-warning">Back to orders</button></a>
              </div>
          </div>
            <!-- <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between">
                <h6 class="text-white text-capitalize ps-3">Menus table</h6>
                <a href="/admin/menus/create"><button class="btn btn-white text-warning me-3" >Create</button></a>
              </div>
            </div> -->
            <div class="card-body pb-2 text-secondary">
              <div class="col-md-8 mx-auto">
              <table class="table">

            <tbody>
                <tr>
                    <th scope="col">Label</th>
                    <th scope="col">Value</th>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td>{{$order->customer->name}}</td>
                </tr>
                <tr>
                    <td>Restaurant Name</td>
                    <td>{{$order->restaurant->name}}</td>
                </tr>
                <tr>
                    <td>Is Finish</td>
                    <td>
                        @if($order->is_finish)
                            <span class="badge bg-success">Finished</span>
                        @else
                            <span class="badge bg-danger">Not Finished</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Remark</td>
                    <td>{{$order->remark}}</td>
                </tr>
               
            
                @foreach($order_details as $detail)
                <tr>
                    <td>Menu</td>
                    <td>{{$detail->menu->name}}</td>    
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>{{$detail->quantity}}</td>
                </tr>
                <tr>
                    <td>Remark</td>
                    <td>{{$detail->remark}}</td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>{{$detail->created_at->diffForHumans()}}</td>
                </tr>
                @endforeach
                
            </tbody>
            </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>

</x-layout>