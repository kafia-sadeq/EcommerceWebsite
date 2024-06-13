<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        @foreach ($products as $item)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="{{ Storage::url($item->image) }}" alt="Image Description">
              </div>
              <div class="detail-box">
                <h6>
                  {{$item->title}}
                </h6>
                <h6>
                  price
                  <span>
                  ${{$item->price}}
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
            <div style="padding: 15px">
              <a href="{{url('product_details',$item->id)}}" class="btn btn-danger">Details</a>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div>
  </section>