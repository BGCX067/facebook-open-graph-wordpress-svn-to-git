<?php
    if($_POST['fbog'] == 'Y') {
		//Form data sent
		$dbvalue = $_POST['appid'];
                update_option('fbog_appid', $dbvalue);
		
                $dbvalue = $_POST['admins'];
		update_option('fbog_admins', $dbvalue);
                
                $dbvalue = $_POST['image'];
		update_option('fbog_image', $dbvalue);
		?>
		<div class="updated"><p><strong><?php _e('Data saved.' ); ?></strong></p></div>
    <?php
    }
    
    $fbappId  = get_option('fbog_appid');
    $fbadmins = get_option('fbog_admins');
    $fbimage  = get_option('fbog_image');
?>
<style type="text/css">
    body{
        font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
        font-size:12px;
    }
    p, h1, form{border:0; margin:0; padding:0;}
    .spacer{clear:both; height:1px;}
    /* ----------- Form ----------- */
    .form{
        width:400px;
        padding:14px;
        margin:20px 0 0 0;
    }
    
    .container {
    	position: relative;
    }

    /* ----------- Open Graph Form ----------- */   
    #open-graph {        ;
        /*background-image: -moz-linear-gradient(center top , #FFFFFF, #EEEEEE);
	    box-shadow: 0 0 2px rgba(0, 0, 0, 0.2), 0 1px 1px rgba(0, 0, 0, 0.2);*/
        
        -webkit-border-radius: 2px;
		-moz-border-radius: 2px;
		border-radius: 2px; 
		
		margin: 12px 0 0;
		padding: 20px 25px 15px;
		background: #f5f5f5;
		border: 1px solid #e5e5e5;		
    }
    #open-graph h1 {
        font-size:20px;
        font-weight:bold;
        margin-bottom:8px;
    }
    #open-graph p{
        font-size:12px;
        color:#666666;
        margin-bottom:20px;
        border-bottom:solid 1px #DFDFDF;
        padding-bottom:10px;
    }
    #open-graph label{
        display:block;
        font-weight:bold;
        text-align:right;
        width:140px;
        float:left;
        clear:left;
        margin:0 10px 10px 0;
    }
    #open-graph .small{
        color:#666666;
        display:block;
        font-size:11px;
        font-weight:normal;
        text-align:right;
        width:140px;
    }
    #open-graph input {       
        display: inline-block;
		height: 29px;
		margin: 0;
		padding-left: 8px;
		background: #fff;
		border: 1px solid #d9d9d9;
		border-top: 1px solid #c0c0c0;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		-webkit-border-radius: 1px;
		-moz-border-radius: 1px;
		border-radius: 1px;
		margin:0 10px 20px 0;
    }
    #open-graph input:hover {
    	border: 1px solid #b9b9b9;
		border-top: 1px solid #a0a0a0;
		-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
		-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
		box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    }
    
    #open-graph input:focus {
        outline: none;
		border: 1px solid #4d90fe;
		-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
		-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
		box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
    }    
	#open-graph button {
		clear:both;
		margin-left: 150px;
		border: 1px solid #3079ed;
		color: #fff;
		font-size: 12px;
    	padding: 4px 10px;
		text-shadow: 0 1px rgba(0,0,0,0.1);
		background-color: #4d90fe;
		background-image: -webkit-gradient(linear,left top,left bottom,from(#4d90fe),to(#4787ed));
		background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
		background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
		background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);
		background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
		background-image: linear-gradient(top,#4d90fe,#4787ed);
	}
	#open-graph button:hover {
		border: 1px solid #2f5bb7;
		color: #fff;
		text-shadow: 0 1px rgba(0,0,0,0.3);
		background-color: #357ae8;
		background-image: -webkit-gradient(linear,left top,left bottom,from(#4d90fe),to(#357ae8));
		background-image: -webkit-linear-gradient(top,#4d90fe,#357ae8);
		background-image: -moz-linear-gradient(top,#4d90fe,#357ae8);
		background-image: -ms-linear-gradient(top,#4d90fe,#357ae8);
		background-image: -o-linear-gradient(top,#4d90fe,#357ae8);
		background-image: linear-gradient(top,#4d90fe,#357ae8);
	}
	#open-graph button:active {
		-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
		-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
		box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
	}

</style>
<div class="container">
<div id="open-graph" class="form">
    <form id="form" name="form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <h1>Facebook Open Graph Meta Data</h1>

        <label>App Id
            <span class="small">Facebook application id</span>
        </label>
        <input type="text" name="appid" id="appid" value="<?php echo $fbappID?>" />

        <label>Admins
            <span class="small">Facebook Admins</span>
        </label>
        <input type="text" name="admins" id="admins" value="<?php echo $fbadminID?>" />

        <label>Image Url
            <span class="small">Default image</span>
        </label>
        <input type="text" name="image" id="image" value="<?php echo $fbimage?>" />
        
        <label>HTML tag</label>
        	<span class="small">Include Facebook scheme</span>
        <input type="checkbox" name="html" id="html" value="" />

        <input type="hidden" name="fbog" value="Y" />
        <div class="spacer"></div>
        <button type="submit">Save</button>

    </form>
</div>
</div>
<div class="container">
<h2>Installation:</h2>
<ol>
    <li>
        <a href="#step1">Create Facebook Application & Copy App ID</a>
    </li>

    <li>
        <a href="#step3">Copy facebook user ID (who is admin of the app)</a>
    </li>
    <li>
        <a href="#step4">Set default Image URL</a>
    </li>
    <li>
        <a href="#step4">Change theme's html tag    </a>
    </li>
    <li>
        <a href="#step5">How to add Facebook Like</a>
    </li>
</ol>
<br /><br />
<div id="step1">
    <h2>1. Create Facebook Application</h2>
    
    First visit the link <a href="http://developers.facebook.com/setup/" target="_blank">http://developers.facebook.com/setup/</a>
    and fill the information and click create app.
    You'll then <br /> redirect to <a href="https://developers.facebook.com/apps" target="_blank">https://developers.facebook.com/apps</a>
    this page. Where you'll see your application. Now select the App ID which is <strong>Numeric</strong>. <br /> Now paste the App ID
    on the above form.
    <img src="<?php echo WP_PLUGIN_URL; ?>/<?php echo pluginDirName; ?>/appid.jpg" alt="app id" />
    <br /><br />
    
    Also add your domain and url to the facebook application setting like the following image. <br />
     <img src="<?php echo WP_PLUGIN_URL; ?>/<?php echo pluginDirName; ?>/app_web_setting.jpg" alt="web url setting" />
    
</div>

<br /><br />
<div id="step3">
    <h2>2. Copy facebook user ID</h2>
    
    To get insight data you've to put your Facebook User ID on the above form. If you don't know your facebook user ID <br />
    then you could <a target="_blank" href="http://thinkdiff.net/demo/newfbconnect1/php/sdk3/index.php">visit the app</a> and <br />
    login and copy your facebook UID. You'll see a part on the application. Where <strong>id</strong> is your Facebook UID  
    <pre>
        User Information using Graph API

Array
(
    [id] => XXXXXXXX
    [name] => Your name
    </pre>
</div>

<br /><br />
<div id="step4">
    <h2>3. Set default Image URL</h2>
    Just put a valid image url on the field. Because if your post/page has no image then this image will use.
    url should be like this: <strong>http://yourdomain.com/yourimage.jpg</strong>
</div>

<br /><br />
<div id="step5">
    <h2>4. Change theme's html tag</h2>
    If you didn't change the <strong>html</strong> tag, open graph meta data will not work as expected. So you've to change your theme's html tag and put this
    <br />
    <code>
        <?php
            echo htmlentities('<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" <?php language_attributes(); ?>>
    ');
        ?>
    </code>
</div>

<br /><br />
<div id="step6">
    <h2>5. How to add Facebook Like</h2>
    
    <img src="<?php echo WP_PLUGIN_URL; ?>/<?php echo pluginDirName; ?>/like.jpg" alt="facebook like" />
    <br /><br />
    If you want to add facebook like button in a post, locate and open single.php in your theme files, and add the <br />
    following code where you want the button to appear. If you want it to appear right after your article <br />
    content for example, locate the_content fonction, and add it after the function.
    <br /><br />
    
    <code>
        <?php
            echo htmlentities('<div style="margin-top:15px;">
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&layout=standard&amp;show_faces=false&amp;width=560&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:560px; height:28px"></iframe>
</div>');
        ?>
    </code>
    
    <br /><br />
    For more info about like button visit: <a href="http://developers.facebook.com/docs/reference/plugins/like/" target="_blank">http://developers.facebook.com/docs/reference/plugins/like/</a>
    <br />
    You can add other facebook social plugins from here <a target="_blank" href="http://developers.facebook.com/docs/plugins/">http://developers.facebook.com/docs/plugins/</a> 
</div>
</div>