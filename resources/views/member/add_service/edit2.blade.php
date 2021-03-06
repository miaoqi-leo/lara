
@extends('layouts.admin')
@section('content')

	 <!--面包屑导航 开始-->
	 <div class="crumb_warp">
			 <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
			 <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">编辑文章</a>

	 </div>
	 <!--面包屑导航 结束-->

 <!--结果集标题与导航组件 开始-->
 <div class="result_wrap">

			 <div class="result_content">
					 <div class="short_wrap">
						 <a href="{{url('member/article2/create')}}"><i class="fa fa-plus"></i>添加文章</a>
						 <a href="{{url('member/article2')}}"><i class="fa fa-refresh"></i>全部文章</a>
					 </div>
			 </div>
	 </div>
	 <!--结果集标题与导航组件 结束-->
	 <div class="result_wrap">
			 <div class="result_title">
				 <h3>添加文章</h3>

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
			 <form action="{{url('member/article2/'.$field->art_id)}}" method="post">
				 <input type="hidden" name="_method" value="put">
				 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>
									 <tr>
											 <th width="120">文章分类：</th>
											 <td>
													 <select name="cate_id">

															 @foreach($data as $k=>$v)
															<option value={{$v->cate_id}}
																@if($v->cate_id == $field->cate_id)
																selected
																@endif

																> {{$v->_cate_name}}</option>
															 @endforeach
													 </select>
											 </td>
									 </tr>

									 <tr>
											 <th> 文章标题：</th>
											 <td>
													 <input type="text" class="lg" name="art_title" value="{{$field->art_title}}">

											 </td>
									 </tr>
									 <tr>
											<th></i>编辑：</th>
											<td>
													<input type="text" class="sm" name="art_editor" value="{{$field->art_editor}}">
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


										<input type="text" size="50" name="art_thumb" value="{{$field->art_thumb}}">
										<input id="file_upload" name="file_upload" type="file" multiple="true">


										 </td>
									</tr>
									<tr>
											<th> </th>
											<td>
													<img  id="art_thumb_img" style="max-width:350px;max-height:150px"  src="/{{$field->art_thumb}}">

											</td>
									</tr>



									 <tr>
											<th>描述：</th>
											<td>
													<textarea name="art_description">{{$field->art_description}}</textarea>
											</td>
									</tr>



									<tr>
										 <th>文章内容：</th>

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
												 <script id="editor" name="art_content" type="text/plain" style="width:860px;height:350px;">{!!$field->art_content!!}</script>
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
