<x-layout>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between align-items-center">
                  <h4 class="my-2 text-center ms-3 text-white">Detail</h4>
                  <a href="/admin/menus"><button class="btn btn-white me-3 mt-2 text-warning">Back to menus</button></a>
              </div>
          </div>
            <!-- <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="shadow-primary border-radius-lg pt-4 pb-3 bg-primary d-flex justify-content-between">
                <h6 class="text-white text-capitalize ps-3">Menus table</h6>
                <a href="/admin/menus/create"><button class="btn btn-white text-warning me-3" >Create</button></a>
              </div>
            </div> -->
            <div class="card-body pb-2 text-secondary">
                <!-- <div class="d-flex justify-content-center">
                <img src="/storage/{{$menu->image}}" alt="" width="200" height="200">
                </div> -->
              <!-- <p>Name: {{$menu->name}}</p>
              <p>Description: {{$menu->description}}</p>
              <p>Price: {{$menu->price}}</p>
              <p>Available in: {{$menu->restaurant->name}}</p>
              <p>Category: {{$menu->menuCategory->name}}</p> -->
              <div class="col-md-8 mx-auto">
              <table class="table">

<tbody>
    <tr>
        <th scope="col">Label</th>
        <th scope="col">Value</th>
    </tr>
    <tr>
        <td>Name</td>
        <td>{{$menu->name}}</td>
    </tr>
    <tr>
        <td>Description</td>
        <td>{{$menu->description}}</td>
    </tr>
    <tr>
        <td>Price</td>
        <td>{{$menu->price}}</td>
    </tr>
    <tr>
        <td>Available in:</td>
        <td>{{$menu->restaurant->name}}</td>
    </tr>
    <tr>
        <td>Category:</td>
        <td>{{$menu->menuCategory->name}}</td>
    </tr>
    <tr>
        <td>Image:</td>
        <td><img src="/storage/{{$menu->image}}" alt="" width="200" height="200"></td>
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