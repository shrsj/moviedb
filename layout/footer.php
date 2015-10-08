
<!--facebook-->
<div id="footer">

	<?php if(isset($_GET['movid']))
	{
		$root = "http://movies.sj";
		$filename = $_SERVER['PHP_SELF'];
		$mov = "?movid=";
		$id = $_GET['movid'];
 		$url = $root.$filename.$mov.$id;

	}

	?>
    <h3><i>Copyright</i> &#169; <b><i>Shravan Hegde</i></b></h3>

    <div class="fb-like" data-href="<?php echo $url; ?>" data-width="40" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" id="fb">
	    
    </div> &nbsp; &nbsp;

<!-- =Gpoogle plus-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  	<g:plusone ></g:plusone>


<!-- TWITTER share-->
    <a href="https://twitter.com/share" class="twitter-share-button" data-via="Shravan_hegde" data-hashtags="ilovemovies">Tweet</a>
	<script>!
		function(d,s,id){
			var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
			if(!d.getElementById(id)){
				js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);
			}
		}(document, 'script', 'twitter-wjs');
	</script>

	<!-- TWITTER hashtag-->
	<a href="https://twitter.com/intent/tweet?button_hashtag=I_LOVE_MOVIES" class="twitter-hashtag-button">Tweet #I_LOVE_MOVIES</a>
	<script>!
		function(d,s,id){
			var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
			if(!d.getElementById(id)){
				js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
				fjs.parentNode.insertBefore(js,fjs);
			}
		}(document, 'script', 'twitter-wjs');
	</script>


	<!-- Linked in-->
	<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
	<script type="IN/Share" data-url="http://movies.sj/" data-counter="right"></script>


<!-- PINTREST-->
	<a data-pin-color="white" data-pin-do="buttonBookmark" null href="//www.pinterest.com/pin/create/button/"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_white_20.png" /></a>
	<!-- Please call pinit.js only once per page -->
	<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
</div>


