 @extends('wrapper')
 @section('content')
 @foreach($detail as $detail)

 <div class="container ">
    <div class="row">
        <div class="col-lg-12">
            <!-- BreadScrum-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$detail->nametype}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$detail->proname}}</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$detail->type}} {{$detail->name}}</a></li>
                </ol>
            </nav>
            <!-- End BreadScrum-->
            <p class="post-title-lg">{{$detail->title}} </p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 p" id='thongtin'>
            <div class="ycc">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="navigation_post_left">
                            <ul>
                                <li><a href="#thongtin">thông tin chung</a></li>
                                <li><a href="#motachitiet">mô tả chi tiết</a></li>
                                
                                <li><a href="#hinhanh">hình ảnh</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="navigation_post_right">
                            <ul>
                                <li><span>GỌI NGAY</span> <strong>{{$detail->phone_home}}</strong></li>

                                <li class="save">
                                    <i class="fa fa-heart-o"></i> Lưu tin
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="row">
                <div class="col-lg-9 ">
                    <div class="summary-item">
                        <div class="summary-address">
                            <div class="summary_item_headline">Địa chỉ:</div>
                            <div class="summary_item_info">{{$detail->street}},{{$detail->type}} {{$detail->name}}, {{$detail->proname}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="summary_item_headline">Loại tin rao:</div>
                                <div class="summary_item_info"><a href='{{url("search?type=$detail->id")}}'>{{$detail->nametype}}</a></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="summary_item_headline">Đối tượng:</div>
                                <div class="summary_item_info"><?php if($detail->doituong==0) echo "Tất cả"; else if($detail->doituong==1) echo "Nam"; else echo "Nữ"; ?></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="summary_item_headline">Người đăng:</div>
                                <div class="summary_item_info">{{$detail->username}}</div>
                            </div>
                            <div class="col-lg-6 item-phone-post">
                                <div class="summary_item_headline">Số điện thoại:</div>
                                <div class="summary_item_info summary_item_info_phone">
                                    <i class="fa fa-phone"></i> {{$detail->phone}}</div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="summary_item_headline">Ngày cập nhật:</div>
                                    <div class="summary_item_info">1 giờ trước</div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="summary_item_headline">Diện tích:</div>
                                    <div class="summary_item_info summary_item_info_area">{{$detail->area}}m<sup>2</sup></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="summary_item_headline">Giá cho thuê:</div>
                                    <div class="summary_item_info summary_item_info_price"><?php                                      
                                    $var = explode("@",$detail->price);
                                    if($var[1]==1) echo  number_format($var[0])." Nghìn/tháng";
                                    else echo $var[0].' Triệu/tháng';
                                    ?> </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn_response_phone"><i class="fa fa-phone"></i> 0961467216</button>
                        </div>
                        <div class="descript_detail">
                           <div class="motachitiet">
                            <h2 id="motachitiet">Thông tin mô tả</h2>
                            <p>{!!$detail->desc!!}</p>
                            </div>
                            <h2 id="hinhanh">Hình ảnh</h2>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <?php
                                $img = explode(";",$detail->image);
                                foreach($img as $key=>$val){

                                    ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key ?>" ></li>

                                    <?php 
                                }
                                ?>
                            </ol>

                            
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                             @for($i=0;$i<sizeof($img);$i++)
                             <div class="item @if($i==0) active @endif">
                                <img src='{{asset("images/home/$img[$i]")}}'  alt="...">
                            </div>
                            @endfor



                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-3 mypanel">
                <!-- Danh mục cho thuê-->
                @include('subpage.right-main-content')
                <!--End danh mục cho thuê-->

                <!-- Tin theo quan huyen-->
                <div class="block-right aaaa">
                    <div class="title">Xem theo quận huyện</div>
                    <div class="content">
                        <ul>
                            @foreach($district as $district)
                            
                            <li><a href='{{url("search?type=$detail->id&district=$district->districtid")}}'>

                               {{$detail->nametype}} {{$district->type}} {{$district->name}}
                            </a>
                        </li>
                          @endforeach

                    </ul>
                </div>
            </div>
            <!--end-->
        </div>
    </div>
</div>
</div>
</div>
@endforeach
@endsection
@section('script')
<script>
    $(document).ready(function() {

        Resize();
    });




    $(window).resize(function() {
        Resize();
    });



    function Resize() {
        var a = $(window).width();
        if (a < 550) {
            $('.by-author').css('display', 'none');
            $('.media-object').width(130);
            $('.media-object').height(110);
            $('.area').css("")
        } else {
            $('.by-author').css('display', 'block');
            $('.media-object').width(160);
            $('.media-object').height(140);
        }
        if (a < 975) {
            $('.navigation_post_left,.navigation_post_right,.ad').css('display', 'none');
            $('.btn_response_phone').css('display', 'block');
            $('.item-phone-post').css('display', 'none');

        } else {
            $('.navigation_post_left,.navigation_post_right,.ad').css('display', 'block');
            $('.btn_response_phone').css('display', 'none');
            $('.item-phone-post').css('display', 'block');
        }
        if (a < 1183) {
            $('.navigation_post_right').css('display', 'none');
        } else {
            $('.navigation_post_right').css('display', 'block');
        }
    }



</script>


@endsection
