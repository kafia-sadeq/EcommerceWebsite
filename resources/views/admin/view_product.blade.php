<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
    .dev_deg{
     display: flex;
     justify-content: center;
     align-items: center;
     margin-top:60px
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
      font-size: 20px;
      color: white;
      padding: 15px
    }
    td{
      color: wheat;
      border: 1px solid yellowgreen;
      padding: 10px

    }
    .dev_pagination{
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top:20px;
    }
    img{
      width:80px;
      height: 100px;
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
        <div class="container-fluid">
            <div class="dev_deg">
            <table class="table-deg">
                <tr>
                  <th>Title</th>
                  <th>Descripation</th>
                  <th>Price</th>
                  <th>category</th>
                  <th>Quentity</th>
                  <th>Image</th>
                </tr>
                @foreach ($product as $data)
                  <tr>
                    <td>{{ $data->title}}</td>
                    <td>{!!Str::limit($data->description,100) !!}</td>
                    <td>{{ $data->category}}</td>
                    <td>{{ $data->price}}</td>
                    <td>{{ $data->quantity}}</td>
                    <td>
                     <img src="{{ Storage::url($data->image) }}" alt="Image Description">
                    </td>
                  </tr>
                @endforeach
              </table>
        </div>
        <div>
          <div class="dev_pagination">       
            {{$product->links()}}
         </div>
        </div>
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