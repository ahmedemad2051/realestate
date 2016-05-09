@foreach($allBu as $key=>$bu)
   @if($key % 3==0 && $key!=0)
    <div class='clearfix'></div>
    @endif
    <div class="col-md-4 pull-right">
      <div class="productbox">
          <img src="{!! url('uploads/'.$bu->bu_image) !!}" class="img-responsive">
        <div class="producttitle">{!! $bu->bu_name!!}</div>
        <p class="text-justify">{!! str_limit($bu->bu_small_dis,60) !!}</p>
        <hr>
        <span>المساحة : {!! $bu->bu_square !!}</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span>نوع العملية : {!! getRent()[$bu->bu_rent] !!}</span>
        <br>
        <span>نوع العقار : {!! getTypes()[$bu->bu_type] !!}</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span>المكان : {!! getPlace()[$bu->bu_place] !!}</span>
        <div class="productprice">
            <div class="pull-left">
                @if($bu->bu_status==0)
                <a  class="btn btn-danger btm-sm" role="button">فى انتظار الموافقة<span class="fa fa-arrow-circle-o-right" style='color:#fff'></span></a>
                @else
                <a href="{!! url('/singleBuilding',$bu->id) !!}" class="btn btn-primary btm-sm" role="button">أظهر التفاصيل<span class="fa fa-arrow-circle-o-right" style='color:#fff'></span></a>
                @endif
            </div><div class="pricetext">{!! $bu->bu_price !!} €</div></div>
      </div>
    </div>
@endforeach