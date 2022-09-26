<x-layout>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between align-items-center">
                  <h4 class="my-2 text-center ms-3 text-white">Customer Detail</h4>
                  <a href="/admin/customers"><button class="btn btn-white me-3 mt-2 text-warning">Back to customers</button></a>
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
                    <td>Name</td>
                    <td>{{$cus->name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$cus->email}}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{$cus->phone}}</td>
                </tr>
                <tr>
                    <td>Image</td>
                
                    <td>
                        @if($cus->image)
                            <img src="/storage/{{$cus->image}}" width="200" height="200" class="rounded">
                        @else
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="" class="rounded" width="200" height="200">
                        @endif
                    </td>
                </tr>
            </tbody>
            </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>

</x-layout>