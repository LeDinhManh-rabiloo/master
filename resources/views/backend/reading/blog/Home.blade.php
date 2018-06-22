@extends('backend.reading.blog.client')
@section('content1')
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<!--post start-->
			<?php foreach ($arr as $key) { ?>
			<div class="col-md-6 grid2">  
				<article class="post hentry">
	                <div class="thumbnails">
	                    <a href="" title=""><img src="{{$key->avatar}}" class="post-thumbnail img-responsive" style="width: 100%; height: 200px; border: 1px solid #eee;" /></a>
	                </div>
					<div class="post-content-area">
						<header class="entry-header text-center">
	                        <div class="post-cat"><a href="#" rel="category tag">
								<?php 
									foreach($arr1 as $key1)
									{
										if($key1->id==$key->catalog)
											echo $key1->name;
									}
						 			
								 ?>
	                        </a></div>
	                    	<a href=""  rel="bookmark" class="entry-title"><?php echo $key->name?></a>   
						</header> <!--/.entry-header -->

						<div class="entry-content">
	    					<p class="nho"><?php echo $key->description ?></p>
	                	</div><!-- .entry-content -->

	                	<div class="entry-meta text-center">
	                        <span class="posted-on"><?php echo $key->dateTime; ?></span>
	                    </div>
	                    <!-- .entry-meta -->

					</div>
			    </article>
			</div>
			<?php }?>
			<!--/post end-->

			
			<!--pagination start-->
			<div class="col-md-12">
				<ul class="pagination">
					{{$arr->links()}}
				</ul>				
			</div>
			<!--/pagination end-->

		</div>
	</div>
	<!--sidebar start-->
	<div class="col-md-4">
		<div class="primary-sidebar widget-area" role="complementary">

			<aside class="widget widget_search">
				<form role="search" method="get" id="searchform" action="">
					<div> 
						<input type="text" placeholder="Search here..." name="s" id="s" />
						<button type="submit" class="submit"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</aside>

		</div>
	</div>
	<!--sidebar end-->
@endsection