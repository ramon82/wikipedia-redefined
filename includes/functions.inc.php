<?php
	function parseWikiArticle($text){
            	//function to remove the first bars from a link and fix the broken images
                //$text = wikicontent
                
		global $scheme;
		
		return str_replace(array('"//','"/'),array('"'.$scheme,'"'),$text);
	}
        
        function redirectToWikipedia(){
            //function to redirect to wikipedia if errors on page
            
            global $wikipedia_site_url, $articleURL;
            
            header('location: '.$wikipedia_site_url.'/wiki/'.$articleURL);
	    exit();
        }
        
        function toOneLine($str){
            //replace the $str line breaks and whitespaces
            return trim(str_replace(array("\n","
                              ","
","\t"),'',$str));
        }
	
	function aboutBox(){
		//show the about box
		global $wikiConfig;
		
		return ($wikiConfig['show-about-panel']==false)?'':'
	<section id="about">
		<h2 id="about-btn">About</h2>
		
		<div id="about-wrapper">   
			The original design and all ideas come from the project "<a href="http://wikipediaredefined.com" target="_blank">Wikipedia Redefined</a>" by <a href="http://newisnew.lt/en" target="_blank">NEW! agency</a>.
			<br><br>
			
			I (<a href="http://ramon82.com" target="_blank">Ramon</a>) only did the code, which is available on github:
			<div>
				<iframe src="http://ghbtns.com/github-btn.html?user=ramon82&repo=wikipedia-redefined&type=fork&count=true"  allowtransparency="true" frameborder="0" scrolling="0" width="95px" height="20px"></iframe>
				<iframe src="http://ghbtns.com/github-btn.html?user=ramon82&repo=wikipedia-redefined&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="95px" height="20px"></iframe>
			</div>
			'.(($wikiConfig['show-social-buttons']==true)?'
			Share the project to help us:
			<div class="jump-share-icons">
				<!-- generate this widget here: http://jumpr.me/widgets/?socialbuttons -->
				<a href="http://jumpr.me/?redir=share&ref=widget-alternative&url=http%3A%2F%2Fwikipedia.ramon82.com&msg=The%20redesigned%20Wikipedia" data-url="http://wikipedia.ramon82.com" data-msg="The redesigned Wikipedia" data-remove="" data-fb="" data-sitename="Wikipedia Redefined" data-count="true" data-gplus-count="true" data-grey-style="true" data-layout="horizontal" data-tooltip="bottom">Share "Wikipedia Redefined" on Jump, Facebook or Twitter</a>
			</div>
			':'').'
			Enjoy! :D
		</div>
         </section>';
	}
	
	function googleAnalytics(){
		//google analytics code
		global $wikiConfig;

		$domain = explode('/',$wikiConfig['site-url']);
		return '
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(["_setAccount", "'.$wikiConfig['google-analytics'].'"]);
			/*_gaq.push(["_setDomainName", "'.$domain[0].'"]);*/
			_gaq.push(["_trackPageview"]);
			
			(function() {
			    var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;
			    ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
			    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		';
	}
?>
