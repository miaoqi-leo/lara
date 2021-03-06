
@extends('layouts.admin')
@section('content')
<!-- 电视广播 -->
	 @include('layouts.add_service.header')

	 <div class="result_wrap">
			 <form action="{{url('member/article')}}" method="post">
				 <input type="hidden" value="{{$cate_id}}" name="cate_id">
				 <!-- <input  value="{{$cate_name}}" name="cate_name"> -->
				 <input type="hidden" value=1 name="art_type">

				 {{csrf_field()}}
					 <table class="add_tab">
							 <tbody>

								 <tr>
										<th>public_资源得分：</th>
										<td>
												<input type="text" class="lg" name="art_title">

										</td>
								</tr>


								 <tr>
										 <th>public_资源标题：</th>
										 <td>
												 <input type="text" class="lg" name="art_title">

										 </td>
								 </tr>

								 <tr>
										 <th width="120">public_资源分类：</th>
										 <td>
													 <p>
														 对应上传资料格式：
														{{$articleadd_name}}
													 </p>
										 </td>
								 </tr>

								 <tr>
									 	 <th> public_发布人：</th>
										 <td>
										 <input type="text"  class="lg" value="{{$company_name}}" name="art_editor">
									 	</td>
								 </tr>

									 <tr>
											 <th width="120">public_展现形式：</th>
											 <td>

													 <select  name="art_form"  >

														 <option selected="selected" >请选择</option>
														 <option value="喷绘">喷绘</option>
														 <option value="视频">视频</option>
														 <option value="图片">图片</option>
														 <option value="语音">语音</option>
														 <option value="文字">文字</option>
														 <option value="灯箱">灯箱</option>
													 </select>
											 </td>
									 </tr>

									 <tr>
											 <th width="120">public_报刊名称：</th>
											 <td>
													<input type="text" class="lg" name="art_name" >
											 </td>
									 </tr>


									 <tr>
											 <th width="120">public_最小投放时长：</th>
											 <td>
													<input type="text" class="md" name="art_minday" >天
											 </td>
									 </tr>

									 <tr>
											 <th width="120">public_刊例价：</th>
											 <td>
													<input type="text" class="md" name="art_price" >元

													<select  name="art_price_unit" class="sm"  >
														<option selected="selected" >计费方式</option>
														<option value="1">每天</option>
														<option value="7">每周</option>
														<option value="30">每月</option>
														<option value="365">每年</option>
													</select>
											 </td>
									 </tr>


									 <tr>
											 <th width="120">public_最早投放时间：</th>
											 <td>
												  <input type="text" placeholder="最早投放时间" name="art_startdate" class="laydate-icon md" onclick="laydate()">
											 </td>
									 </tr>

									<tr>
											<th width="120">public_状态：</th>
											<td>

												<input type="radio" name="np_colorprint" value="0">待售
												<input type="radio" name="np_colorprint" value="1">已售

											</td>
									</tr>

									<tr>
										 <th width="120">public_影响区域：</th>
										 <td>
											 <div id="distpicker" data-toggle="distpicker">
												 <select name="area_add1" class="md"></select>
												 <select name="area_add2"  class="md"></select>
												 <select name="area_add3"  class="md"></select>
											 </div>
										 <script src="{{asset('resources/org/ChinaAddress/js/distpicker.data.js')}}"></script>
										 <script src="{{asset('resources/org/ChinaAddress/js/distpicker.js')}}"></script>
										 <script src="{{asset('resources/org/ChinaAddress/js/main.js')}}"></script>
										 <script>
										 $("#distpicker").distpicker({
											 province: "---- 请选择省 默认为全国 ----",
											 city: "---- 请选择市 默认为全省 ----",
											 district: "---- 请选择区 默认为全市 ----",
											 autoSelect: false
											 });
										 </script>
										 </td>
								 </tr>



									<tr>
										<th>public_缩略图：</th>
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
 									 <th>简介</th>
 									 <td>
 										 <textarea name="art_description" class="lg">{{old('art_description')}}</textarea>
 									 </td>
 								 </tr>

									<tr>
 								 		<th>public_详细内容及板块报价图：</th>
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



								 <tr>
										<th>电视台/广播频道：</th>
										<td>
												<input type="text" class="md" name="tv_channel">
										</td>
								</tr>

								<tr>
									 <th>节目播放总时长：</th>
									 <td>

										 <select class="md" name="tv_lifetype" id="tv_lifetype" onchange="checkandshow('#tv_lifetype','#tv_lifetype_show')">
											 <option value="1" selected="selected">长期节目</option>
											 <option value="0">阶段节目</option>
										 </select>
										 <br>
										 <span id="tv_lifetype_show" style="display:none">
											 	 开播日期：<input type="text" placeholder="开播日期" name="tv_life_start" class="laydate-icon md" onclick="laydate()">
											 	 停播日期：<input type="text" placeholder="停播日期" name="tv_life_start" class="laydate-icon md" onclick="laydate()">
										 </span>
									 </td>
							 </tr>

							 <tr>
									<th>节目播放频率：</th>

										<td>

 										 <select  class="md" name="tv_lifetype" id="tv_showtype" onchange="checkandshow('#tv_showtype','#tv_showtype_show')">
 											 <option value="1" selected="selected">每天</option>
 											 <option value="0">每周</option>
 										 </select>
 										 <br>
 										 <span id="tv_showtype_show" style="display:none">
												 <input type="checkbox" name="tv_time_frequency">周一　　
												 <input type="checkbox" name="tv_time_frequency">周二　　
												 <input type="checkbox" name="tv_time_frequency">周三　　
												 <input type="checkbox" name="tv_time_frequency">周四　　
												 <input type="checkbox" name="tv_time_frequency">周五　　
												 <input type="checkbox" name="tv_time_frequency">周六　　
												 <input type="checkbox" name="tv_time_frequency">周日　　
 										 </span>
 									 </td>
							</tr>

								<tr>
									 <th>节目播放时段：</th>

									 <td>

										 	小时：<select class="md" name="">
													<option>请选择开播小时</option>
												<?php

												for($i=0;$i<24;$i++){
													echo "<option value=".$i.">".$i."</option>";
												}
												 ?>
											</select>

												分：<select class="md" name="">
													<option>请选择开播分钟</option>
													<?php
													for($i=0;$i<60;$i++){
														echo "<option value=".$i.">".$i."</option>";
													}
													 ?>
												</select>

											 	 <input type="text" placeholder="开播时间" name="tv_life_start" class="laydate-icon md" onclick="laydate()">
											 	 <input type="text" placeholder="结束时间" name="tv_life_start" class="laydate-icon md" onclick="laydate()">
									 </td>
							 </tr>

							 <tr>
									<th>常规类/特约类（备注费用计算方法）：</th>
									<td>
											<textarea type="text" class="md" name="tv_calculate"></textarea>
									</td>
							</tr>

							<tr>
								 <th>收视率/收听率：</th>
								 <td>
										 <input type="text" class="sm" name="tv_audience"> 万次/节目
								 </td>
						 </tr>

						 <tr>
								<th>收视率/收听率：</th>
								<td>
										<p>

										</p>
								</td>
						</tr>





									<tr>
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

@include('layouts.tools.serviceaddjs')
@endsection
