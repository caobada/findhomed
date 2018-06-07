@extends('wrapper')
@section('link')
	<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.dataTables.css')}}">
@endsection
@section('content')
	<div class="container" style="margin-top: 20px;">
	<div class="row">
		<table id="table_id" class="display">
			

			<thead>
				<tr>
					<th>ID</th>
					<th>Tiêu Đề</th>
					<th>Danh mục</th>
					<th>Giá</th>
					<th>Phone</th>
					<th>Ngày đăng</th>
					<th></th>
					
				</tr>
			</thead>
			<tbody>
			@foreach($data as $data)
				<tr>
					<td>{{$data->home_id}}</td>
					<td>{{$data->title}}</td>
					<td>{{$data->hometype->nametype}}</td>
					<td><?php                                      
                                    $var = explode("@",$data->price);
                                    if($var[1]==1) echo  number_format($var[0])." Nghìn/tháng";
                                    else echo $var[0].' Triệu/tháng';
                                    ?></td>
					<td>{{$data->phone_home}}</td>
					<td>{{$data->created_at}}</td>
					<td>Xóa</td>
				</tr>
		@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
	$(function(){
		$("#table_id").dataTable({
			"language": {
      		"emptyTable": "Không có bài đăng nào tồn tại!"
   			 }
			});
	})
</script>
@endsection