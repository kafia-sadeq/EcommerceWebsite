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
    th{
      font-weight: bold;
      background-color: skyblue;
      padding: 15px;
      font-size: 20px;
      color: white;
    }
    td{
      color: wheat;
      border: 1px solid yellowgreen;
      padding: 10px

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
          <h1>Add Category</h1>
            <form action="{{url('Add_category')}}" method="POST">
            @csrf
              <div class="dev-design">
                <input type="text" name="category">
                <input type="submit"value="Add Category" class="btn btn-primary">
              </div>
              <div>
                <table class="table-deg">
                  <tr>
                    <th>Category Name</th>
                    <th>Delete Category</th>
                  </tr>
                  @foreach ($data as $categoryName)
                    <tr>
                      <td>{{ $categoryName->category_name}}</td>
                      <td><a href="{{url('delete_category',$categoryName->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </form>
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