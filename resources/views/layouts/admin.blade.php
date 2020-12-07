<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
		<meta NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW,NOARCHIVE">

		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="0">

	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>{{$commonSiteTitle}}の管理画面</title>

	  <link rel="stylesheet" href="/css/bootstrap.css">

	  <link rel="stylesheet" href="/css/admin/font-awesome.min.css">
	  <link rel="stylesheet" href="/css/admin/ionicons.min.css">
	  <link rel="stylesheet" href="/css/admin/AdminLTE.min.css">
	  <link rel="stylesheet" href="/css/admin/skins/_all-skins.css">

	  <link rel="stylesheet" href="/css/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	  <!-- Google Font: Source Sans Pro -->
	  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @if (env("APP_ENV") == "local")
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + 
':35729/livereload.js?snipver=1"></' + 'script>')</script>
    @endif
	  <link rel="stylesheet" href="/css/admin/style.css?v=2">

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	  <script src="/js/jquery.js"></script>
	  <script src="/js/tool.js"></script>

<script>
function onDelete(){
if (confirm('本当に削除してよろしいですか？')){
                return true
   }
return false
 }
    </script>
		@yield('header')
	</head>

	<body @if ($pageType) class="hold-transition skin-blue sidebar-mini" @else class="hold-transition login-page" @endif>
		<div class="wrapper">

			@if ($pageType)
				<!-- ヘッダー -->

			  <header class="main-header">
			    <!-- Logo -->
			    <a href="" class="logo">
			      <!-- mini logo for sidebar mini 50x50 pixels -->
			      <span class="logo-mini"></span>
			      <!-- logo for regular state and mobile devices -->
			      <span class="logo-lg">@if (isset($commonSiteTitle)){{$commonSiteTitle}}@else <b>管</b>理システム@endif</span>
			    </a>
			    <!-- Header Navbar: style can be found in header.less -->

			    <nav class="navbar navbar-static-top">

			      <!-- Sidebar toggle button-->
			      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			        <span class="sr-only">Toggle navigation</span>
			      </a>


			      <div class="navbar-custom-menu">
			        <ul class="nav navbar-nav">
			          <li class="dropdown user user-menu">
			            <a href="/admin/logout/" class="dropdown-toggle" data-toggle="dropdown">
			              <span class="hidden-xs">ログアウト</span>
			            </a>
			          </li>
			        </ul>
			      </div>
			    </nav>
			  </header>

				<!-- サイドバー -->
			  <aside class="main-sidebar">
			    <section class="sidebar">
			      <ul class="sidebar-menu">
                        <li class="treeview" id="menu3">
                            <a href="{{route("admin.user.index")}}">
                              <i class="glyphicon glyphicon-hdd"></i>
                              <span>会員一覧</span>
                              <i class="fa fa-angle-left pull-right"></i>
                          </a>
                        </li>
                        <li class="treeview" id="menu3">
                            <a href="{{route("admin.post.index")}}">
                              <i class="glyphicon glyphicon-hdd"></i>
                              <span>相談一覧</span>
                              <i class="fa fa-angle-left pull-right"></i>
                          </a>
                        </li>
                        <li class="treeview" id="menu3">
                            <a href="{{route("admin.expert.index")}}">
                              <i class="glyphicon glyphicon-hdd"></i>
                              <span>専門家一覧</span>
                              <i class="fa fa-angle-left pull-right"></i>
                          </a>
                        </li>
                        <li class="treeview" id="menu3">
                            <a href="{{route("admin.out.index")}}">
                              <i class="glyphicon glyphicon-hdd"></i>
                              <span>出金依頼一覧</span>
                              <i class="fa fa-angle-left pull-right"></i>
                          </a>
                        </li>
                        <li class="treeview" id="menu3">
                            <a href="{{route("admin.introduction.index")}}">
                              <i class="glyphicon glyphicon-hdd"></i>
                              <span>紹介顧客管理</span>
                              <i class="fa fa-angle-left pull-right"></i>
                          </a>
                        </li>
                        <li class="treeview" id="menu3">
                            <a href="{{route("admin.manage.index")}}">
                              <i class="glyphicon glyphicon-hdd"></i>
                              <span>管理ユーザー</span>
                              <i class="fa fa-angle-left pull-right"></i>
                          </a>
                        </li>

			      </ul>
			    </section>
			  </aside>
			@endif

			@if ($pageType == 1)
		  	<div class="content-wrapper">
			@endif

			 @if (!empty($isLayoutList))
				<section class="content-header">
				  <h1>

				    {{config('pages.info')[$commonPageName]['title']}}
				    <small>一覧</small>
				  </h1>
				  <ol class="breadcrumb">
				    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>


				    <li class="active">{{config('pages.info')[$commonPageName]['title']}}の一覧</li>
				  </ol>
				</section>
				@endif



			  @if (!empty($isLayoutEdit))
			  	<!-- 編集のヘッダー -->
					<section class="content-header">	
                    <h1>	
                        {{config('pages.info')[$commonPageName]['title']}}	
                        <small>登録/編集</small>	
                    </h1>	
                    <ol class="breadcrumb">	
                        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>	

                        @if (!empty($layoutListUrl))	
                            <li><a href="{{$layoutListUrl}}"><i class="fa fa-table"></i>{{config('pages.info')[$commonPageName]['title']}}一覧</a></li>	
                        @endif	

                        <li class="active">{{config('pages.info')[$commonPageName]['title']}}の登録/編集</li>	
                    </ol>	

                    <?php if (!empty($objErrorInput)){ ?>	

                    <div class="mt alert alert-danger alert-dismissible">	
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>	
                        <h4><i class="icon fa fa-ban"></i>エラー</h4>	
                        入力エラーがあります。	
                    </div>	
                    <?php } ?>	
                </section>	

            @endif	

            @yield('main')	
            @if ($pageType == 1)	
        </div>	
    @endif	
</div>	

@if ($pageType)	
    <footer class="main-footer">	
        <strong>Copyright &copy; 管理システム</strong> All rights	
        reserved.	
    </footer>	

    <script src="/js/admin/jquery-ui.min.js"></script>	
    <script src="/js/bootstrap/bootstrap.min.js"></script>	
    <script src="/js/admin/app.min.js"></script>	
    <script src="/js/admin/cms.js"></script>	
@endif	
</body>
</html>