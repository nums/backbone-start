<?php
error_reporting(1);

require 'config.php';
require 'functions.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>

		<title>Awdio</title>
		<meta name="description" content=""/>
		
		<script>
			var FRONT_URL = '<?php echo FRONT_URL; ?>';
			var WS_URL = '<?php echo WS_URL; ?>';
		</script>
		
		<script type="text/javascript" src="<?php echo FRONT_URL; ?>vendor/jquery/jquery.min.js"></script>
        
        <style>
        .link {
            cursor:pointer;
            color:blue;
        }
        #loading {
            display:none;
        }
        </style>
        
	</head>
	<body>
		
		<!--<div id="log" style="position:absolute;width:50%;left:100px;height:150px;background:#ff8888;z-index:10000">
		</div>-->
		
	
		<div id="loading">
			<table style="width:100%;height:100%;">
				<tr>
					<td align="center">
						CHARGEMENT AJAX
					</td>
				</tr>
			</table>
		</div>
		
		MA PAGE TEST
		
		<div class="link" data-url="user/">LES USER</div>
		
		<hr />
		
		<div id="page">
		</div>
		
		
		
		
		<?php
			echo showTemplates('templates');
		?>
		
		<!--[if lt IE 7]> 
			<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
		<![endif]-->

		<script type="text/javascript" src="<?php echo FRONT_URL; ?>vendor/lodash/lodash.min.js"></script>
		<script type="text/javascript" src="<?php echo FRONT_URL; ?>vendor/backbone/backbone.js"></script>		
		<script type="text/javascript" src="<?php echo FRONT_URL; ?>js/main.js"></script>

		<?php
			echo showJs('js/models');
			echo showJs('js/routes');
			echo showJs('js/views');
		?>
		
	</body>
</html>