<? 
//include framework 
include('framework.php'); 
?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Waiting</title>
		
		<!--  Main Script -->		
		<script type="text/javascript" charset="utf-8" src='script/master.js'></script>
		<link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
		
		<!--  jQuery --> 
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.min.js"></script>
		<script type="text/javascript" charset="utf-8" src='script/jquery-ui-1.8.17.custom.min.js'></script>
		<link rel="stylesheet" href="css/jquery-ui-1.8.17.custom.css" type="text/css" media="screen" title="no title" charset="utf-8">
		
		<!--  Auth -->
		<script type="text/javascript" charset="utf-8" src='script/facebook.js'></script>
		
		<script>
        	//initialise JS 
        	Framework = function() { 
        		this.facebook_app_id = <?=$FB_APP_ID ?>;
        		this.site_url = "<?=$SITE_URL ?>";
        	}; 

        	framework = new Framework;
        </script>
		
	</head>
	
	<body id="index" >

		<div id="fb-root"></div>
		<div pub-key="pub-3935e335-b4d7-4c1d-a53f-9902f8d18cb5" sub-key="sub-3cb83317-12c2-11e1-ae8f-cd58960bee98" ssl="off" origin="pubsub.pubnub.com" id="pubnub"></div>
		<script src="http://cdn.pubnub.com/pubnub-3.1.min.js"></script>

		<div id='content'>
			<script>

			  window.fbAsyncInit = function() {

			    FB.init({
			      appId      : <? if ($_SERVER['HTTP_HOST'] == 'localhost:8888') {echo "'170665036364063'";} else {echo "'336334779713416'";} ?>, // App ID
			      channelURL : <? if ($_SERVER['HTTP_HOST'] == 'localhost:8888') {echo "'//localhost:8888/evrythng/html/5thngs'";} else {echo "'//evrythng.jimmytidey.co.uk/5thngs/'";} ?>, // Channel File
			      status     : true, // check login status
			      cookie     : true, // enable cookies to allow the server to access the session
			      oauth      : true, // enable OAuth 2.0
			      xfbml      : true  // parse XFBML
			    });

			  };

			  // Load the SDK Asynchronously
			  (function(d){
			     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
			     js = d.createElement('script'); js.id = id; js.async = true;
			     js.src = "//connect.facebook.net/en_US/all.js";
			     d.getElementsByTagName('head')[0].appendChild(js);
			   }(document));

			</script>
		</div>	
	</body>
</html>