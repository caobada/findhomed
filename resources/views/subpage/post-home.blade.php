 @extends('wrapper')
 @section('content')
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>

 <div class="container reg ">
    <div class="row ">
        <div class="col-lg-12 ">
            <div class="row ">
                <div class="col-lg-8 ">
                    <div class="body-reg ">
                        <div class="bl-left">
                            <div class="title-reg ">
                                <font>hướng dẫn đăng tin</font>
                            </div>
                            <div class="reg-info">
                                <li><b>Thông tin có dấu <span class="red-require ">(*)</span> là bắt buộc</b></li>
                                <li><b>Nội dung phải viết bằng tiếng Việt có dấu</b></li>
                                <li><b>Tiêu đề tin không dài quá 100 kí tự</b></li>
                                <li>Các bạn nên điền đầy đủ thông tin vào các mục để tin đăng có hiệu quả hơn.</li>
                                <li>Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách kéo icon tới đúng vị trí của tin rao.</li>
                                <li>Tin đăng có hình ảnh rõ ràng sẽ được xem và gọi gấp nhiều lần so với tin rao không có ảnh. Hãy đăng ảnh để được giao dịch nhanh chóng!</li>
                            </div>
                        </div>
                        <div class="title-reg ">
                            <font>thông tin cơ bản</font>
                        </div>
                        <form method="post" id="post-home" action="posthome" data-toggle="validator" role="form" enctype = "multipart/form-data">
                            <div class="reg-info ">

                                <p class="bg-alert ">Là người văn minh và tôn trọng người xem, hãy viết nội dung bằng Tiếng Việt có dấu</p>
                                
                                <div class="row ">

                                    <div class="col-sm-12 ">
                                        <div class="form-group ">
                                            <label class="col-sm-12 control-lable ">Tiêu đề tin<span class="red-require ">(*)</span></label>
                                            <input class="form-control " placeholder="Hãy đặt tiêu đề đủ nghĩa, khách quan " type="text " name="title" data-error="dddd" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row ">
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Loại chuyên mục<span class="red-require ">(*)</span></label>
                                            <select class="form-control" name="hometype" required>
                                                <option value="">Chọn loại chuyên mục</option>
                                                @foreach($hometype as $a)
                                                <option value="{{$a->id}}">{{$a->nametype}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Số điện thoại<span class="red-require ">(*)</span></label>
                                            <input class="form-control " type="text " name="phone"  
                                            pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" 
                                            data-error="a"
                                            required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row ">
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Giá cho thuê<span class="red-require ">(*)</span></label>
                                            <input class="form-control " type="text " name="price">

                                        </div>
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Đơn vị<span class="red-require "></span></label>
                                            <select class="form-control " name="pricetype">
                                                <option value="0">Triệu/tháng</option>
                                                <option value="1">Nghìn/tháng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row ">
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Diện tích<span class="red-require ">(*)</span></label>
                                            <input class="form-control " type="text " name="area">
                                            <span class="help-block"></span>

                                        </div>
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Đối tượng cho thuê<span class="red-require "></span></label>
                                            <select class="form-control " name="doituong">
                                                <option value="0">Tất cả</option>
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="title-reg ">
                                <font>địa chỉ</font>
                            </div>
                            <div class="reg-info ">

                                <div class="form-group ">
                                    <div class="row ">
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Tỉnh/Thành phố<span class="red-require ">(*)</span></label>
                                            <select id="province2" class="form-control" required name="province">
                                                <option value="">Chọn Tỉnh/TP</option>   
                                                @foreach($province as $a)
                                                <option value="{{$a->provinceid}}">{{$a->type}} {{$a->name}}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Quận huyện<span class="red-require ">(*)</span></label>
                                            <select id="district2" class="form-control" required="" name="district">
                                                <option value="">Tất cả</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row ">
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Phường/Xã<span class="red-require"></span></label>
                                            <select id="ward" class="form-control" name="ward">
                                                <option value="">Tất cả</option>

                                            </select>

                                        </div>
                                        <div class="col-sm-6 col-xs-12 ">
                                            <label class="col-sm-12 control-lable ">Đường<span class="red-require "></span></label>
                                            <select class="form-control ">
                                                <option value="">Tất cả</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row ">

                                        <div class="col-sm-12 ">
                                            <label class="col-sm-12 control-lable ">Địa chỉ chính xác<span class="red-require ">(*)</span></label>
                                            <input id="address" class="form-control"  placeholder="Hãy nhập địa chỉ chính xác để khách dễ tìm hơn" type="text " name="address" required>
                                        </div>
                                    </div>
                                </div>

                                
                                </div>

                                <div class="title-reg ">
                                    <font>thông tin mô tả</font>
                                </div>
                                <div class="reg-info">
                                    <p class="bg-success-info">Giới thiệu mô tả về tin đăng của bạn. Ví dụ: Khu nhà có vị trí thuận lợi: Gần công viên, gần trường học ... Tổng diện tích 52m2, đường đi ô tô vào tận cửa.</p>

                                    <div class="form-group ">
                                        <div class="row ">

                                            <div class="col-sm-12 ">
                                                <label class="col-sm-12 control-lable ">Nội dung<span class="red-require ">(*)</span></label>
                                                <textarea id="desc" class="form-control" rows="5" name="desc"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="title-reg ">
                                    <font>hình ảnh</font>
                                </div>

                                <div class="reg-info">
                                    <p class="bg-success-info">Tin đăng có hình ảnh rõ ràng sẽ được xem và gọi gấp nhiều lần so với tin rao không có ảnh. Hãy đăng ảnh để được giao dịch nhanh chóng!</p>

                                    <div class="form-group ">
                                        <div class="row ">

                                         <div class="file-loading">
                                            <input id="img" name="img[]" multiple type="file" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-warning" name="" value="Đăng tin">

                    </form>
                </div>
                <div class="col-lg-4 ">
                    <div class="bl-right">
                        <div class="title-reg ">
                            <font>hướng dẫn đăng tin</font>
                        </div>
                        <div class="reg-info">
                            <li><b>Thông tin có dấu <span class="red-require ">(*)</span> là bắt buộc</b></li>
                            <li><b>Nội dung phải viết bằng tiếng Việt có dấu</b></li>
                            <li><b>Tiêu đề tin không dài quá 100 kí tự</b></li>
                            <li>Các bạn nên điền đầy đủ thông tin vào các mục để tin đăng có hiệu quả hơn.</li>
                            <li>Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách kéo icon tới đúng vị trí của tin rao.</li>
                            <li>Tin đăng có hình ảnh rõ ràng sẽ được xem và gọi gấp nhiều lần so với tin rao không có ảnh. Hãy đăng ảnh để được giao dịch nhanh chóng!</li>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


@endsection
@section('script')

<script type="text/javascript">

    $(document).ready(function(){
        CKEDITOR.replace( 'desc' );
        Resize();
        $(window).resize(function() {
         Resize();


     });

        $('#post-home').validate({
            rules:{
                title:{
                    required:true,
                    minlength:10,
                    maxlength: 100
                },
                hometype:{
                    required:true
                },
                phone:{
                    required:true,
                    minlength:10,
                    maxlength:11,
                    number:true

                },
                price:{
                    required:true,
                    maxlength:9
                },
                area:{
                    required:true,
                    number:true

                },
                province:{
                    required:true
                },
                district:{
                    required:true
                },
                address:{
                    required:true
                },
                desc:{
                    required:true,
                    minlength:50
                }

            },
            messages:{
                title:{
                    required:"Vui lòng nhập Tiêu Đề!",
                    minlength:"Tiêu đề phải hơn 10 kí tự!",
                    maxlength: "tiêu đề không quá 100 kí tự!"
                },
                hometype:{
                    required:"Xin chọn chuyên mục!"
                },
                phone:{
                    required:"Vui lòng nhập số điện thoại!",
                    minlength:"Số điện thoại không hợp lệ!",
                    maxlength:"Số điện thoại không hợp lệ!",
                    number:"Số điện thoại không hợp lệ!"

                },
                price:{
                    required:"Xin vui lòng nhập giá tiền!",
                    maxlength:"Giá trị không quá tiền trăm triệu!"
                },
                area:{
                    required:"Vui lòng nhập diện tích!",
                    number:"Vui lòng nhập số!"

                },
                province:{
                    required:"Vui lòng chọn Tỉnh/Thành phố!"
                },
                district:{
                    required:"Vui lòng chọn Quận huyện"
                },
                address:{
                    required:"Địa chỉ không được để trống!"
                },
                desc:{
                    required:"Vui lòng thêm thông tin mô tả!",
                    minlength:"Mô tả rõ ràng phải trên 50 kí tự"
                }
            }
        });

        $('#province2').on('change',function(){
            var province =$('#province2 :selected').text();
            var provinceid = $(this).val();
            var wardid = $("#ward").val();

            if(wardid !=""){
                $('#ward').html("<option value=''>Tất cả</option>");
            }
            if(provinceid=="") provinceid=0;
            $.ajax({
                type: 'GET',
                url : 'province/'+ provinceid,
                success:function(resp){
                    $("#district2").html(resp);

                }
            });
            if(provinceid==0) $('#address').val("");
            else $('#address').val(',TP '+province);
        });
        $('#district2').on('change',function(){
            var districtid = $(this).val();
            if(districtid=="") districtid=0;
            var district = $('#district2 :selected').text();
            var province =$('#province2 :selected').text();
            $.ajax({
                type: 'GET',
                url: 'district/'+ districtid,
                success: function(resp){
                    $('#ward').html(resp);
                }   
            });
            if(districtid==0) $('#address').val(','+province);
            else $('#address').val(','+district+','+province);
        });

        $('#ward').on('change',function(){
            var wardid = $("#ward").val();
            var district = $('#district2 :selected').text();
            var province =$('#province2 :selected').text();
            var ward = $('#ward :selected').text();

            if(wardid=="") $('#address').val(','+district+',TP '+province);
            else $('#address').val(','+ward+','+district+',TP '+province);

        });
    });

 function Resize(){
  var a = $(window).width();
  if(a<=992){
    $('.bl-left').css('display','block');
    $('.bl-right').css('display','none');
}
else{
    $('.bl-left').css('display','none');
    $('.bl-right').css('display','block');
}
}


   
</script>
<script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>

@endsection