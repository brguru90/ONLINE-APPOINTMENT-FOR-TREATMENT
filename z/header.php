<?php

	
	//echo $_SERVER['PHP_SELF'];
	//echo session_id();
?>
<link href="fonts/gurufonts.css" type="text/css" rel="stylesheet" media="all">
<script src="api/jquery.js"></script>
<script>
//remember that variable in javascript declared with var & in php '$' in jquery we can use both :) tested
$(document).ready(function(){
   $("input[type='text']").css({"font-family":"guru9","font-weight":"normal"});//set font of all text input element to guru
   //alert($(".examres").val());
   if($(".examres").val()=="Passed")
   {
	   
	$(".examres").css({"color":"red"});//not working------------try after
   }
   $("input[type='number']").css({"font-family":"guru15","font-weight":"bold"});//set font of all number input element to guru15
   $("input[type='file']").css({"font-family":"guru","font-size":"14px"});
   $("option").css({"font-family":"guru","font-weight":"bold"});//set font of all option element to guru
   $("select[name='sem']").css({"font-family":"guru15","font-weight":"bold"});
   $("select[name='sem'] option").css({"font-family":"guru15","font-weight":"bold"});
   $("select[name='branch']").css({"font-family":"guru15","font-weight":"bold"});
   $("select[name='branch'] option").css({"font-family":"guru15","font-weight":"bold"});
   $("select[name='result']").css({"font-weight":"bold","font-size":"18px"});
   $("select[name='result'] option").css({"color":"blue","font-weight":"bold","font-size":"18px"});	  
	   $("select[name='result']").change(function(){
			switch($("select[name='result']").val())
			{
			  case 'Fail':$("select[name='result']").css({"color":"violet","border":"solid 1px red"});
							break;
			  case 'Pass':$("select[name='result']").css({"color":"orange","border":"solid 1px yellow"});
							break;
			  case 'Firs':$("select[name='result']").css({"color":"aqua","border":"solid 1px lightblue"});
							break;
			  case 'Dist':$("select[name='result']").css({"color":"lime","border":"solid 1px green"});
							break;					
			}
		});
		$("select[name='result']").ready(function(){
			switch($("select[name='result']").val())
			{
			  case 'Fail':$("select[name='result']").css({"color":"violet","border":"solid 1px red"});
							break;
			  case 'Pass':$("select[name='result']").css({"color":"orange","border":"solid 1px yellow"});
							break;
			  case 'Firs':$("select[name='result']").css({"color":"aqua","border":"solid 1px lightblue"});
							break;
			  case 'Dist':$("select[name='result']").css({"color":"lime","border":"solid 1px green"});
							break;						
			}
		});
});

</script>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="icon" type="image/png" href="images/img2.jpg">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ask UI Kit Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<script src="js/modernizr.custom.js"></script>
<!----Calender -------->
  <link rel="stylesheet" href="css/clndr.css" type="text/css" />
  <script src="js/underscore-min.js"></script>
  <script src= "js/moment-2.2.1.js"></script>
  <script src="js/clndr.js"></script>
  <script src="js/site.js"></script>
<!----End Calender -------->
	<script src="js/Chart.js"></script>
<link href="css/jquery.nouislider.css" rel="stylesheet">
<script src="js/jquery.nouislider.js"></script>
<link rel="stylesheet" type="text/css" href="css/fd-slider.css">	
	<script type="text/javascript" src="js/fd-slider.js"></script>
<!----video -------->	
<link href="css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				title: "Big Buck Bunny",
				m4v: "http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v",
				poster: "http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
			});
		},
		swfPath: "../../dist/jplayer",
		supplied: "m4v",
		size: {
			width: "379px",
			height: "250px",
			cssClass: "jp-video-360p"
		},
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,
		remainingDuration: true,
		toggleDuration: true
	});
});
//]]>
</script>
<!----//video -------->
<!-- //js -->
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
<style>
#abc li a{
color:blue;font-size:18px;background-color:white;border-bottom:solid silver 2px;
}
#abc ul{
width:90%;line-height:2px;border-radius:15px;
}
.log{width:200px;height:30px;position:fixed;left:5px;top:2px;border:solid white 1px;}
.log form{width:100%;height:28px;padding:0px 0px 0px 0px;font-size:12px;text-transform: capitalize;}
.log input{height:28px;padding:2px 5px -5px 5px;font-size:12px;position:fixed;top:3px;left:6px;background: #4FC1E9 none repeat scroll 0% 0%;color:white;z-index:0;font-family:guru9}
.log b{padding:10px 0px 10px 0px;font-size:12px;position:fixed;top:3px;left:65px;}
.login{
	background:transparent;
	width:80px;
	height:40px;
	font-size:25px;
	float:right;
}
</style>
</head>
<?php
if(isset($_SESSION["query"]))
{
	//echo $_SESSION["query"];;
	$value=$_SESSION["query"];
	echo "<body onload=\"highlightSearchTerms('$value');\">";

}
else
{
	echo "<body>";
}
?>


	<?php
		if(isset($_SESSION["user"]))
		{
			echo "
		<div class='log'>
			<form action='logout.php' method='post' class='login'>
				<input  style='padding:5px 5px 5px 5px' type='submit' value='Logout' name='logout'/><b>";
				echo $_SESSION["user"]."</b>";
		echo "
			</form>
		</div>";
		}
		else if(isset($_SESSION["admin"]))
		{
			echo "
		<div class='log'>
			<form action='logout.php' method='post' class='login'>";
				echo $_SESSION["admin"]."</b>";
		echo "
			</form>
		</div>";
		}
		else
		{}	
	?>
	<!-- content -->
	<div class="content">
		<div class="container">
		<br /><br />
		<h1 align="center" id="topic"><pre >STUDENTS AND FACULTY PERFORMANCE ANALYSIS</pre></h1>
			<!--navigation-->
			<div class="header">
				
				<div class="top-nav">

					<span class="menu">Menu</span>		
					<?php include("menu.php") ?>			
					<!-- script-for-menu -->
					 <script>
					   $( "span.menu" ).click(function() {
						 $( "ul.nav1" ).slideToggle( 300, function() {
						 // Animation complete.
						  });
						 });
					</script>
					<!-- /script-for-menu -->
				</div>
				<div class="search">
					<form action="search0.php" method="get">
						<input type="search" style='font-family:guru14' value="Search" name="query" id="q" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"  required="required">
						<input type="submit" value=" ">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>