@extends('layouts.admin')
	@section('content')
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
			<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;配置项管理
	</div>
	<!--面包屑导航 结束-->

<!--结果页快捷搜索框 开始-->


	<!--结果页快捷搜索框 结束-->

	<!--搜索结果页面 列表 开始-->

			<div class="result_wrap">
				<div class="result_title">
					<h3>配置项列表</h3>
					@if(count($errors)>0)
							<div class="mark">
								@if(is_object($errors))
									@foreach($errors->all() as $error)
											<p>{{$error}}</p>
									@endforeach
								@else
									<P>{{$errors}}</p>
								@endif
							</div>
					@endif
				</div>
					<!--快捷导航 开始-->
					<div class="result_content">
							<div class="short_wrap">
									<a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加配置项</a>
									<a href="{{url('admin/config')}}"><i class="fa fa-refresh"></i>全部配置项</a>
							</div>
					</div>
					<!--快捷导航 结束-->
			</div>

			<div class="result_wrap">
					<div class="result_content">
						<form action="{{url('admin/config/changecontent')}}" method="post">
							{{csrf_field()}}
							<table class="list_tab">
									<tr>
											<th class="tc" width="5%">排序</th>
											<th class="tc"width="5%">ID</th>
											<th>标题</th>
											<th>名称</th>
											<!-- <th>字段类型</th>
											<th>字段值</th> -->
											<th>内容</th>

											<th>操作</th>
									</tr>

									@foreach($data as $v)


									<tr>
											<td class="tc">
													<input type="text" onchange="changeOrder(this,{{$v->conf_id}})" value="{{$v->conf_order}}">
											</td>

											<td class="tc">{{$v->conf_id}}</td>
											<td>

													<a href="#">{{$v->conf_title}}</a>
											</td>
											<td>{{$v->conf_name}}</td>
											<!-- <td>{{$v->field_type}}</td>
											<td>{{$v->field_value}}</td> -->
											<td>
												<input type="hidden" name="conf_id[]" value={{$v->conf_id}}>
												{!!$v->_html!!}
											</td>
											<td>
													<a href="{{url('admin/config/'.$v->conf_id.'/edit')}}">修改</a>
													<a href="javascript::" onclick="delConf({{$v->conf_id}})">删除</a>
											</td>
									</tr>
									@endforeach

							</table>

							<input type="submit">
						</form>
					</div>
			</div>

	<!--搜索结果页面 列表 结束-->
<script>
function changeOrder(obj,conf_id){
	var conf_order=$(obj).val();
	$.post("{{url('admin/config/changeorder')}}",{'_token':'{{csrf_token()}}','conf_id':conf_id,'conf_order':conf_order},function(data){

		if(!data.status){
			layer.msg(data.msg,{icon:6});
		}else{
			layer.msg(data.msg,{icon:5});
		}
	});
}


function delConf(conf_id){

	layer.confirm('是否删除分类？', {
	  btn: ['确认','取消']
	},function(){
			$.post("{{url('admin/config/')}}/"+conf_id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
				if(data.status==0){
					location.href = location.href;
					layer.msg(data.msg, {icon: 1});
				}
				else{
					layer.msg(data.msg, {icon: 1});
				}
			});

	},function(){

	});
}


</script>



	@endsection
