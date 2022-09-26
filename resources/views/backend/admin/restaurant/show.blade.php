<x-layout>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between align-items-center">
                  <h4 class="my-2 text-center ms-3 text-white">Restaurant Detail</h4>
                  <a href="/admin/restaurants"><button class="btn btn-white me-3 mt-2 text-warning">Back to restaurants</button></a>
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
                        <td>{{$rest->name}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$rest->address}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{$rest->phone}}</td>
                    </tr>
                    <tr>
                        <td>Is Open</td>
                        <td>
                            @if($rest->is_open)
                                <span class="badge bg-success">Open</span>
                            @else
                                <span class="badge bg-danger">Close</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Is Promotion</td>
                        <td>
                            @if($rest->is_promotion)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Township</td>
                        <td>{{$rest->township->name}}</td>
                    </tr>
                    <tr>
                        <td>Restaurant Category</td>
                        <td>{{$rest->restaurant_category->name}}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><img src="/storage/{{$rest->image}}" alt="" width="200" height="200"></td>
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