<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
     .dev_category{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-wrap:wrap
    }
    .btn{
        width: 150px !important;
    }
    label{
        display:inline-block;
        width: 250px;
        font-size: 18px !important;
        color: white !important;
    }
    input[type='text']{
        width: 300px;
        height: 50px;
    }
    textarea{

        width: 450px;
        height: 60px;
    }
    .dev_deg{
        padding: 15px
    }
   </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
           <h1>Add Product</h1>
           <div class="dev_category">
            <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="dev_deg">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="dev_deg">
                    <label>Description</label>
                    <textarea name="description" id="" cols="30" rows="10" required></textarea>
                  </div>
                  <div class="dev_deg">
                    <label>Price</label>
                    <input type="number" name="price" required>
                  </div>
                  <div class="dev_deg">
                    <label>Quentity</label>
                    <input type="number" name="qty" required>
                  </div>
                  <div class="dev_deg">
                    <label>Product Category</label>
                    <select name="category" required>
                        <option>Select a Category</option>
                        @foreach ($category as $item)
                         <option value="{{$item->category_name}}">{{$item->category_name}}</option>

                        @endforeach
                    </select>
                  </div>
                  <div class="dev_deg">
                    <label>Image Product</label>
                    <input type="file" name="image">
                  </div>
                  <div class="dev_deg">
                    <input type="submit" class="btn btn-success"  value="Add Product">
                  </div>
            </form>
           </div>
      </div>
    </div>
    <!-- JavaScript files-->
    
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>