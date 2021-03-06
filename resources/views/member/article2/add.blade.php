
@extends('layouts.admin')
@section('content')

	 <!--面包屑导航 开始-->
	 <div class="crumb_warp">
			 <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			 <i class="fa fa-home"></i> <a href="">首页</a> &raquo; 新增资源

	 </div>
	 <!--面包屑导航 结束-->

 <!--结果集标题与导航组件 开始-->
 <div class="result_wrap">

			 <div class="result_content">
					 <div class="short_wrap">
						 <a href="{{url('admin/article2/create')}}"><i class="fa fa-plus"></i>添加资源</a>
						 <a href="{{url('admin/article2')}}"><i class="fa fa-refresh"></i>全部资源</a>
					 </div>
			 </div>
	 </div>
	 <!--结果集标题与导航组件 结束-->
	 <div class="result_wrap">
			 <div class="result_title">
				 <h3>添加您的资源</h3>

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
	 </div>

	 <div class="result_wrap">
			 <form action="{{url('admin/article2')}}" method="post">

				 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>

								 <tr>
										 <th> 资源标题：</th>
										 <td>
												 <input type="text" class="lg" name="art_title">

										 </td>
								 </tr>

									 <tr>
											 <th width="120">资源分类：</th>
											 <td>
													 <select name="cate_id">

															 @foreach($data as $k=>$v)
															<option value={{$v->cate_id}}> {{$v->_cate_name}}</option>
															 @endforeach
													 </select>
											 </td>
									 </tr>

									 <tr>
											 <th width="120">规格尺寸：</th>
											 <td>
													<input type="text" class="md" name="art_shape" >
											 </td>
									 </tr>

									 <tr>
											 <th width="120">规格尺寸：</th>
											 <td>
													<input type="text" class="md" name="art_shape" >
											 </td>
									 </tr>

									 <tr>
											 <th width="120">状态：</th>
											 <td>
													<select type="text" class="md" name="art_state" >
														<option value="0">待售</option>
														<option value="1">已售</option>
													</select>
											 </td>
									 </tr>

									 <tr>
											 <th width="120">状态：</th>
											 <td>
													<select type="text" class="md" name="art_state" >
														<option value="0">待售</option>
														<option value="1">已售</option>
													</select>
											 </td>
									 </tr>

									 <tr>
											 <th width="120">最小投放金额：</th>
											 <td>
												 <input type="text" class="sm" name="art_min_mount">
											 </td>
									 </tr>

									 <!--  -->
									 <tr>
											 <th width="120">时段：</th>
											 <td>
											 	<input type="text" class="sm" name="art_min_mount">
											 </td>
									 </tr>

									 <tr>
												<th width="120">周期：</th>
												<td>
													<input type="text" class="sm" name="art_min_mount">天
												</td>
									</tr>



									 <tr class="company">
										 <th><i class="require">*</i>资源地址：</th>
										 <td>
												 <div id="distpicker" data-toggle="distpicker">
													 <select name="art_add1"></select>
													 <select name="art_add2"></select>
													 <select name="art_add3"></select>
												 </div>
											 <script src="{{asset('resources/org/ChinaAddress/js/distpicker.data.js')}}"></script>
											 <script src="{{asset('resources/org/ChinaAddress/js/distpicker.js')}}"></script>
											 <script src="{{asset('resources/org/ChinaAddress/js/main.js')}}"></script>
											 <script>
											 $("#distpicker").distpicker({
												 province: "---- 所在省 ----",
												 city: "---- 所在市 ----",
												 district: "---- 所在区 ----",
												 autoSelect: false
												 });
											 </script>
									 </td>
									 </tr>

									 <tr>
											<th></i>详细地址：</th>
											<td>
													<input type="text" class="lg" name="art_add_detail">
											</td>
									</tr>
									 <tr>
										 <th> 缩略图：</th>
										 <td>

											<script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
											<link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
											<script type="text/javascript">
												<?php $timestamp = time();?>
												$(function() {
													$('#file_upload').uploadify({
														'buttonText':'上传图片',
														'formData'     : {
															'timestamp' : '<?php echo $timestamp;?>',
															'_token'     : '{{csrf_token()}}',

														},
														'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
														'uploader' : "{{url('admin/upload')}}",
														'onUploadSuccess':function(file,data,response){
															$('input[name=art_thumb]').val(data);
															$("#art_thumb_img").attr('src','/'+data);
														}
													});
												});
											</script>
											<style>
											.uploadify{display:inline-block;}
											.uploadify-button{border:none; border-radius:5px; margin-top:8px;}
											table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
											</style>


										<input type="text" size="50" name="art_thumb">
										<input id="file_upload" name="file_upload" type="file" multiple="true">


										 </td>
									</tr>
									<tr>
											<th> </th>
											<td>
													<img  id="art_thumb_img" style="max-width:350px;max-height:150px" >

											</td>
									</tr>

									 <tr>
											 <th>关键词：</th>
											 <td>
													 <input type="text" class="lg" name="art_keyword">
											 </td>
									 </tr>

									 <tr>
											<th>描述：</th>
											<td>
													<textarea name="art_description"></textarea>
											</td>
									</tr>
									<tr>
										 	<th>详细内容：</th>
											 <td>
											 <style>
													.edui-default{line-height: 28px;}
													div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
													{overflow: hidden; height:20px;}
													div.edui-box{overflow: hidden; height:22px;}
												</style>
											 <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
											 <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
											 <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
											 <script id="editor" name="art_content" type="text/plain" style="width:860px;height:350px;"></script>
											 <script type="text/javascript">
											 		var ue = UE.getEditor('editor');
												</script>
											 </td>
									</tr>

											 <th></th>
											 <td>
													 <input type="submit" value="提交">
													 <input type="button" class="back" onclick="history.go(-1)" value="返回">
											 </td>
									 </tr>
							 </tbody>
					 </table>
			 </form>
	 </div>
@endsection
