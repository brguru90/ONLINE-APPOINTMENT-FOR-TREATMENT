<?php
header('Cache-Control: max-age=900');
//header("Refresh:0");
session_start();
include('visitors.php');
try {
  include('classwise.php');
include('deptwise.php');
}

//catch exception
catch(Exception $e) {
  //echo 'Message: ' .$e->getMessage();
}

include('db.php');
?>
<!DOCTYPE html>
<html>
<meta http-equiv="refresh" content="3600">
<head>
<title id="title">HOME</title>
<link href="fonts/gurufonts.css" type="text/css" rel="stylesheet" media="all">
<script src="api/jquery.js"></script>
<link href="css/bo
otstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="icon" 
  type="image/png" 
  href="images/img2.jpg">
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
color:blue;font-size:15px;background-color:white;border-bottom:solid silver 2px;padding:0px 0px 0px0px;
}
#abc ul{
border-radius:15px;
}
.sub{
	font-size: 1.2em;
    background: #4FC1E9 none repeat scroll 0% 0%;
    color: #FFF;
    padding: 6px;
    text-align: center;
    border: medium none;
    outline: medium none;
   // font-family: "Roboto-Regular";
    width: 30px;
    margin-bottom: 0.1em;
	margin-top: 0.1em;
    display: block;
    transition: all 0.5s ease 0s;
}
.iname,.comment{
	width:310px;
}
.comment{
	height:69px;
	text-align:left;
}
@media only screen and (max-width: 1200px) {
	.comment{
	width:190px;height:69px;
	}
	.iname{
		width:190px;
	}
	.name{
	width:10px;
	}
	.sub[type="submit"]{padding: 6px;}
}
@media only screen and (max-width: 980px) {
	.comment{
	width:150px;height:35px;
	}
	.iname{
		width:150px;
	}
	.name{
	width:10px;
	}
	.sub[type="submit"]{padding: 6px;}
}
@media only screen and (max-width: 650px) {
	.comment{
	width:150px;height:65px;
	}
	.iname{
		width:150px;
	}
	.name{
	width:10px;
	}
	.sub[type="submit"]{padding: 6px;}
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
	$value=$_SESSION["query"];
	unset($_SESSION["query"]);
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
				<input style='padding:5px 5px 5px 5px' type='submit' value='Logout' name='logout'/><b>";
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
		<h1 align="center" id="topic"><pre>STUDENTS AND FACULTY PERFORMANCE ANALYSIS</pre></h1>
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
						<input required="required" style='font-family:guru14' type="search" value="Search" name="query" id="q" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
						<input type="submit" value=" ">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<!--//navigation-->
			<div class="content-btm">
				<div class="col-md-8 content-grids">
					<div class="content-grids-info">
						<div class="col-md-6 content-left">
							<div class="drop-dwn">
								<div class="search2 ">
									<form action="resultsearch.php" method="get">
										<input style='font-family:guru15' type="search" value="Register no" name='reg' onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Register no';}" required="required"  pattern="[0-9]{3}[a-zA-Z]{2}[0-9]{5}">
										<input type="submit" value=" ">
									</form>
								</div>
								<div class="search-btm">
									<div class="temp">
										<div class="temp-right">
											<p class="date" style='font-size:12px'><br />In Sorab</p>
											
												<?php
												//to test whether the internet is available or not by trying to load the sample url
												 $connected = @fsockopen("www.google.com", 80);
												 if($connected)
												 {
													$jsonurl = "http://api.openweathermap.org/data/2.5/weather?lat=14&lon=75&appid=2de143494c0b295cca9337e1e96b00e0";
													$json = file_get_contents($jsonurl);

													$weather = json_decode($json);
													$kelvin = $weather->main->temp;
													$celcius = $kelvin - 273.15;
													echo "<h5 style='font-size:40px'>$celcius%</h5>";
												 }
												 else
												 {
													 echo "<h5 style='font-size:20px'>Internet<br />Unavailable!</h5>";
												 }
												?>
											
										</div>
										<div class="temp-left">
											<img src="images/cloud.png" alt="">
										</div>															
									</div>
									<div class="jobs">
										<ul>
											<li><a class="cmny" href="http://gptsorab.in">College</a></li>
											<li><a href="users.php"class="usr">User</a></li>
										</ul>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>					
						</div>				
						<div class="col-md-6 menu" id="abc" style="background-color:white;border-radius:15px;position:relative;left:8px;height:230px;">
							
						<?php include("notifications.php"); ?>
			
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-6 circles">
						<h3>CLASS WISE AVERAGE RESULT</h3>
						<br />
						<div class="demo">
							<div class="demo-1" data-percent="<?php echo "$perc[0]"; ?>">
								<div class="title">
									<h4>first</h4>
									<p>Year</p>
								</div>
							</div>
							<div class="demo-2" data-percent="<?php echo "$perc[1]"; ?>">
								<div class="title2">
									<h4>Second</h4>
									<p>Year</p>
								</div>
							</div>
							<div class="demo-3" data-percent="<?php echo "$perc[2]"; ?>">
								<div class="title1">
									<h4>Third</h4>
									<p>Year</p>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>	
								<script src="js/jquery.circlechart.js"></script>
							<script>
							$('.demo-1').percentcircle({
							animate : false,
							diameter : 100,
							guage: 3,
							coverBg: '#fff',
							bgColor: '#d9d9d9',
							fillColor: '#1da1f4',
							percentSize: '15px',
							percentWeight: 'normal'
							});

							$('.demo-2').percentcircle({
							animate : false,
							diameter : 100,
							guage: 3,
							coverBg: '#fff',
							bgColor: '#d9d9d9',
							fillColor: '#562b1a',
							percentSize: '15px',
							percentWeight: 'normal'
							});

							$('.demo-3').percentcircle({
							animate : false,
							diameter : 100,
							guage: 3,
							coverBg: '#fff',
							bgColor: '#d9d9d9',
							fillColor: '#E64608',
							percentSize: '18px',
							percentWeight: 'normal'
							});		
										
								</script><script type="text/javascript">

								  var _gaq = _gaq || [];
								  _gaq.push(['_setf', 'UA-36251023-1']);
								  _gaq.push(['_setDomainName', 'jqueryscript.net']);
								  _gaq.push(['_trackPageview']);

								  (function() {
									var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
									ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
									var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
								  })();

								</script>
								<br /><br />
					</div>			
					<div class="col-md-6 result">
						<h3>DEPARTMENT WISE RESULTS</h3>
						<div class="skills-top">
							<h5>CS</h5>
							<div class="skills">
								<div class="skill1" style="width:<?php $percc=0;a('cs'); ?>%"></div>
								<div class="skills-right">
									<p><?php $percc=0;a('cs'); ?>%</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="skills-top">
							<h5>Civil</h5>
							<div class="skills">
								<div class="skill1" style="width:<?php $percc=0;a('civil'); ?>%"></div>
								<div class="skills-right">
									<p><?php $percc=0;a('civil'); ?>%</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="skills-top">
							<h5>EC</h5>
							<div class="skills">
								<div class="skill1" style="width:<?php $percc=0;a('ec'); ?>%"></div>
								<div class="skills-right">
									<p><?php $percc=0;a('ec'); ?>%</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="skills-top">
							<h5>CP</h5>
							<div class="skills">
								<div class="skill1" style="width:<?php $percc=0;a('cp'); ?>%"></div>
								<div class="skills-right">
									<p><?php $percc=0;a('cp'); ?>%</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>											
					</div>
					<div class="clearfix"> </div>
				</div>					
				<div class="col-md-4 content-right">
					<div class="cntnt-img">
					</div>
					<div class="bnr-img">
						<img src="images/clogo.jpg" style='width:170px;height:150px' alt=""/>
					</div>
					<div class="bnr-text">
						<h1 style='font-size:37px;text-transform:capitalize;font-family:guru4'><?php echo strtolower($clg); ?></h1>
						<h5 style='font-size:1em;'>www.gptsorab.in</h5>
						<p style='font-size:0.967em;'>Government Polytechnic Soraba is a technical institute offering three years of Diploma courses in four different branches. The institution
						is under the control of Department Of Technical Education, Government of Karnataka.</p>
					</div>
					<div class="btm-num">
						<ul>
						  <center>
							<li>
								<h4 style='font-size:17px;'>
								<?php echo $count[1]; ?>
								<h5 style='font-size:17px;'>Visitors</h5>
							</li>
							<a href="likes.php" onclick="likes()"><li>
								<h4 style='font-size:17px;'>
								<?php
									$text2=file_get_contents("likes.txt");
									$count2=explode("=",$text2);
								?>
								<b id="lik"><?php echo $count2[1]; ?></b>
								
								</h4 style='font-size:17px;'>
								<h5 style='font-size:17px;'>Likes</h5>
							</li></a>
							<?php
							echo "
							<script>
								var like=".$count2[1]."
								function likes()
								{
									like++;
									//alert(like);
									document.getElementById('lik').innerHTML=like;
								}
								</script>";
								?>
							</center>
						</ul>
					</div>	
				</div>
				<div class="clearfix"></div>
			</div>
			<?php
			//checking browser compatability
			$a=$_SERVER['HTTP_USER_AGENT'];
			//echo $a;
			echo "<script>var browser=0;</script>";
			if(preg_match_all("/(Chrome)/i",$a))
			{
				echo "<script>var browser='chrome';</script>";
			}
			if(preg_match_all("/(MSIE)/i",$a) || preg_match_all("/(Trident)/i",$a))
			{
				echo "<script>var browser='IE';</script>";
			}
			if(preg_match_all("/(Firefox)/i",$a))
			{
				echo "<script>var browser='FF';</script>";
			}
			if(preg_match_all("/(OPR)/i",$a) || preg_match_all("/(OPERA)/i",$a))
			{
				echo "<script>var browser='opera';</script>";
			}
			if(preg_match_all("/(UBrowser)/i",$a))
			{
				echo "<script>var browser='UC';</script>";
			}
			?>
			<script type='text/javascript'>
					//to set grid in equal height
					$(document).ready(function(){
					setInterval(function(){ht();}, 1);
					/*
					   $("#vk").click(function(){	
							ht();
						});
						$(document).mousemove(function(){	
							ht();
						});
						$(document).mouseover(function(){	
							ht();
						});
						$(document).mouseout(function(){	
							ht();
						});
						*/
						function ht()
						{
							if(browser=='opera' && (window.devicePixelRatio)>2.9)
							{}
							else
							if(browser=='IE' && (window.devicePixelRatio)>2.9)
							{}
							else
							if(browser=='chrome' && browser!='opera'&& (window.devicePixelRatio)>2.1)
							{}
							else
							if(browser=='UC' && (window.devicePixelRatio)<1.9 && (window.devicePixelRatio)>1.75)
							{}
							else
							if(window.devicePixelRatio<3)//device width
							{
								var h1=$("#vk").height();
								var h2=$("#kv").height();//
								var h4=$("#kvk").height();//
								var h5=$("#vkv").height();
								//alert(h1+":"+h2+":"+h4+":"+h5)
								var h=h2-h1;
								//alert(h1+":"+h2);
								$("#adm").height(h1);
								$("#vkv").height(h5-h);
							}							
						}
					});
			</script>
			
			<div class="center-grids">
				<div class="col-md-4 calnder" id="cal">
					<div class="calender-right"  id='kv'>
						<div class="clndr-top" id='kvk'>							
							<h3>CALENDAR</h3>
							<div class="bottom-border"> </div>
						</div>
						<div class="column_right_grid calender" id="vkv">
	                      <div class="cal1">
							<div class="clndr">
								<div class="clndr-controls">
									<div class="clndr-control-button">
										<p class="clndr-previous-button">previous</p>
									</div>
									<div class="month">May 2015</div>
									<div class="clndr-control-button rightalign">
										<p class="clndr-next-button">next</p>
									</div>
								</div>
								<table class="clndr-table" border="0" cellspacing="0" cellpadding="0" id="ttt">
								  <thead>
								   <tr class="header-days">
								    <td class="header-day">S</td>
									<td class="header-day">M</td>
									<td class="header-day">T</td>
									<td class="header-day">W</td>
									<td class="header-day">T</td>
									<td class="header-day">F</td>
									<td class="header-day">S</td>
								  </tr>
								 </thead>
								 <tbody>
								 <tr>
								  <td class="day past adjacent-month last-month calendar-day-2015-04-26"><div class="day-contents">26</div></td><td class="day past adjacent-month last-month calendar-day-2015-04-27">
									<div class="day-contents">27</div>
								  </td>
								  <td class="day past adjacent-month last-month calendar-day-2015-04-28">
									<div class="day-contents">28</div></td><td class="day past adjacent-month last-month calendar-day-2015-04-29"><div class="day-contents">29</div>
								  </td>
								  <td class="day past adjacent-month last-month calendar-day-2015-04-30">
									<div class="day-contents">30</div>
								  </td><td class="day past calendar-day-2015-05-01"><div class="day-contents">1</div></td><td class="day past calendar-day-2015-05-02"><div class="day-contents">2</div></td></tr><tr><td class="day past calendar-day-2015-05-03"><div class="day-contents">3</div></td><td class="day past calendar-day-2015-05-04"><div class="day-contents">4</div></td><td class="day past calendar-day-2015-05-05"><div class="day-contents">5</div></td><td class="day past calendar-day-2015-05-06"><div class="day-contents">6</div></td><td class="day past calendar-day-2015-05-07"><div class="day-contents">7</div></td><td class="day past calendar-day-2015-05-08"><div class="day-contents">8</div></td><td class="day past calendar-day-2015-05-09"><div class="day-contents">9</div></td></tr><tr><td class="day past event calendar-day-2015-05-10"><div class="day-contents">10</div></td><td class="day past event calendar-day-2015-05-11"><div class="day-contents">11</div></td><td class="day past event calendar-day-2015-05-12"><div class="day-contents">12</div></td><td class="day past event calendar-day-2015-05-13"><div class="day-contents">13</div></td><td class="day today event calendar-day-2015-05-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-05-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-05-16"><div class="day-contents">16</div></td></tr><tr><td class="day calendar-day-2015-05-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-05-18"><div class="day-contents">18</div></td><td class="day calendar-day-2015-05-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-05-20"><div class="day-contents">20</div></td><td class="day event calendar-day-2015-05-21"><div class="day-contents">21</div></td><td class="day event calendar-day-2015-05-22"><div class="day-contents">22</div></td><td class="day event calendar-day-2015-05-23"><div class="day-contents">23</div></td></tr><tr><td class="day calendar-day-2015-05-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-05-25"><div class="day-contents">25</div></td><td class="day calendar-day-2015-05-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-05-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-05-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-05-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-05-30"><div class="day-contents">30</div></td></tr><tr><td class="day calendar-day-2015-05-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-06-01"><div class="day-contents">1</div></td><td class="day adjacent-month next-month calendar-day-2015-06-02"><div class="day-contents">2</div></td><td class="day adjacent-month next-month calendar-day-2015-06-03"><div class="day-contents">3</div></td><td class="day adjacent-month next-month calendar-day-2015-06-04"><div class="day-contents">4</div></td><td class="day adjacent-month next-month calendar-day-2015-06-05"><div class="day-contents">5</div></td><td class="day adjacent-month next-month calendar-day-2015-06-06"><div class="day-contents">6</div></td></tr></tbody></table></div></div>
						</div>
					</div>
				</div>	
				<div class="col-md-4 pie-charts" id='vk'>
					<div class="pie-chrt">
					<h3 style='color:dark'>TOTAL RESULTS</h3>
						<canvas id="doughnut" height="200" width="200"></canvas>
						<script>
							var doughnutData = [
									{
										value : <?php
												if(isset($_SESSION['fail']))
												echo $_SESSION['fail'];
												else
												echo "0";
												?>,
										color : "red"
									},
									{
										value: <?php
												if(isset($_SESSION['pass']))
												echo $_SESSION['pass'];
												else
												echo "0";
												?>,
										color:"yellow"
										
									},
									{
										value : <?php
												if(isset($_SESSION['second']))
												echo $_SESSION['second'];
												else
												echo "0";
												?>,
										color : "aqua"
									},
									
									{
										value : <?php
												if(isset($_SESSION['first']))
												echo $_SESSION['first'];
												else
												echo "0";
												?>,
										color : "skyblue"
									},
									{
										value : <?php
												if(isset($_SESSION['dist']))
												echo $_SESSION['dist'];
												else
												echo "0";
												?>,
										color : "lime"
									}
								
								];

							new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);						
						</script>
					</div>
					<div class="line-chrt">
					<h3>COMMENTS</h3>
						<div id="line" height="160" width="353">
							<form action="feedback.php" method="POST">
								<b>Enter your name</b><br />
								<input type="text" value="" name='name' class="iname" required="required" /><br />
								<b>post your comments</b><br />
								<textarea rows="4" cols="30" name="msg" class="comment" required="required" ></textarea><br />
								<center><input type='submit' class="sub" value="submit" style="width:70px;"/></center>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4 login-form" id='adm'>
					<div class="login-pad">
					<br /><br /><br /><br />
						<h3>ADMIN LOGIN</h3>
						<form  action="admin_login.php" method="post">
							<input type="text" value="Username" name="user"  onfocus="this.value='';this.select()" onblur="if (this.value == '') {this.value = 'Username';}" required>
							<input type="password" value="Password" name="pwd" onfocus="this.select()" onblur="if (this.value == '') {this.value = 'Password';}" required>							
							<input style='font-family:guru' type="submit" value="SIGN IN">
						</form>
						<p></p>
						<br /><br /><br />
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="work-grids">
				<div class="clearfix"> </div>
			</div>
			
			<div class="footer">
				<p>© 2015 Ask UI Kit . All Rights Reserved | Template by  <a href="http://w3layouts.com/">  W3layouts</a></p>
			</div>
		</div>
	</div>
	</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"> </script>

</body>
</html>