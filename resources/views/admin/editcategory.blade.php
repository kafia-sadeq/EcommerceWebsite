<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
     .dev-design{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-wrap:wrap
    }
    .btn{
        width: 150px !important;
    }
    input[type="text"]{
        width: 400px;
        height:50px;
        border-radius:10px;
        margin:20px
    }
    .table-deg{
      text-align: center;
      margin: auto;
      border: 2px solid yellowgreen;
      margin-top: 50px;
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
            <h1>Update Category</h1>
            <form action="{{url('update_category',$data->id)}}" method="POST">
            @csrf
              <div class="dev-design">
                <input type="text" name="category" value="{{$data->category_name}}">
                <input type="submit"value="Update Category" class="btn btn-primary">
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