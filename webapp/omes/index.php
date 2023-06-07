
<?php
	session_start();
	if(isset($_SESSION['rememberme'])){
		if(isset($_SESSION['admin'])){
    		header("Location: ../dashboard/");
	        die();
    	}else{
			header("Location: ../client/");
	        die();
    	}
	}else{
		session_unset();
	}
?>

<!DOCTYPE html>
<!--[if IE 9 ]> <html lang="en-US" class="ie9 loading-site no-js"> <![endif]--><!--[if IE 8 ]> <html lang="en-US" class="ie8 loading-site no-js"> <![endif]--><!--[if (gte IE 9)|!(IE)]><!--><html lang="en-US" class="loading-site no-js">
<!--<![endif]--><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="./../xmlrpc.php">
<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script><title>OMES &#8211; Bhemax4IT &#8211; Online Mock Examination System</title>
<meta name="robots" content="max-image-preview:large">
<link rel="alternate" type="application/rss+xml" title="Bhemax4IT - Online Mock Examination System &raquo; Feed" href="./../feed/index.php">
<link rel="alternate" type="application/rss+xml" title="Bhemax4IT - Online Mock Examination System &raquo; Comments Feed" href="./../comments/feed/index.php">
<script type="text/javascript">
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/","svgExt":".svg","source":{"concatemoji":".\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.1.1"}};
/*! This file is auto-generated */
!function(e,a,t){var n,r,o,i=a.createElement("canvas"),p=i.getContext&&i.getContext("2d");function s(e,t){var a=String.fromCharCode,e=(p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,e),0,0),i.toDataURL());return p.clearRect(0,0,i.width,i.height),p.fillText(a.apply(this,t),0,0),e===i.toDataURL()}function c(e){var t=a.createElement("script");t.src=e,t.defer=t.type="text/javascript",a.getElementsByTagName("head")[0].appendChild(t)}for(o=Array("flag","emoji"),t.supports={everything:!0,everythingExceptFlag:!0},r=0;r<o.length;r++)t.supports[o[r]]=function(e){if(p&&p.fillText)switch(p.textBaseline="top",p.font="600 32px Arial",e){case"flag":return s([127987,65039,8205,9895,65039],[127987,65039,8203,9895,65039])?!1:!s([55356,56826,55356,56819],[55356,56826,8203,55356,56819])&&!s([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]);case"emoji":return!s([129777,127995,8205,129778,127999],[129777,127995,8203,129778,127999])}return!1}(o[r]),t.supports.everything=t.supports.everything&&t.supports[o[r]],"flag"!==o[r]&&(t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&t.supports[o[r]]);t.supports.everythingExceptFlag=t.supports.everythingExceptFlag&&!t.supports.flag,t.DOMReady=!1,t.readyCallback=function(){t.DOMReady=!0},t.supports.everything||(n=function(){t.readyCallback()},a.addEventListener?(a.addEventListener("DOMContentLoaded",n,!1),e.addEventListener("load",n,!1)):(e.attachEvent("onload",n),a.attachEvent("onreadystatechange",function(){"complete"===a.readyState&&t.readyCallback()})),(e=t.source||{}).concatemoji?c(e.concatemoji):e.wpemoji&&e.twemoji&&(c(e.twemoji),c(e.wpemoji)))}(window,document,window._wpemojiSettings);
</script><style type="text/css">img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 0.07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}</style>
<link rel="stylesheet" id="wp-block-library-css" href="./../wp-includes/css/dist/block-library/style.min.css?ver=6.1.1" type="text/css" media="all">
<link rel="stylesheet" id="classic-theme-styles-css" href="./../wp-includes/css/classic-themes.min.css?ver=1" type="text/css" media="all">

<style id="global-styles-inline-css" type="text/css">body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');--wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');--wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');--wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');--wp--preset--duotone--midnight: url('#wp-duotone-midnight');--wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');--wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');--wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;}:where(.is-layout-flex){gap: 0.5em;}body .is-layout-flow > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-flow > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-flow > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-constrained > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-constrained > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)){max-width: var(--wp--style--global--content-size);margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignwide{max-width: var(--wp--style--global--wide-size);}body .is-layout-flex{display: flex;}body .is-layout-flex{flex-wrap: wrap;align-items: center;}body .is-layout-flex > *{margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
.wp-block-navigation a:where(:not(.wp-element-button)){color: inherit;}
:where(.wp-block-columns.is-layout-flex){gap: 2em;}
.wp-block-pullquote{font-size: 1.5em;line-height: 1.6;}</style>
<link rel="stylesheet" id="contact-form-7-css" href="./../wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.6.4" type="text/css" media="all">
<link rel="stylesheet" id="hfe-style-css" href="./../wp-content/plugins/header-footer-elementor/assets/css/header-footer-elementor.css?ver=1.6.13" type="text/css" media="all">
<link rel="stylesheet" id="elementor-icons-css" href="./../wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.16.0" type="text/css" media="all">
<link rel="stylesheet" id="elementor-frontend-css" href="./../wp-content/plugins/elementor/assets/css/frontend-lite.min.css?ver=3.8.0" type="text/css" media="all">
<link rel="stylesheet" id="elementor-post-6-css" href="./../wp-content/uploads/elementor/css/post-6.css?ver=1671026780" type="text/css" media="all">
<link rel="stylesheet" id="elementor-pro-css" href="./../wp-content/plugins/elementor-pro/assets/css/frontend-lite.min.css?ver=3.8.0" type="text/css" media="all">
<link rel="stylesheet" id="elementor-global-css" href="./../wp-content/uploads/elementor/css/global.css?ver=1671030254" type="text/css" media="all">
<link rel="stylesheet" id="elementor-post-357-css" href="./../wp-content/uploads/elementor/css/post-357.css?ver=1671031720" type="text/css" media="all">
<link rel="stylesheet" id="hfe-widgets-style-css" href="./../wp-content/plugins/header-footer-elementor/inc/widgets-css/frontend.css?ver=1.6.13" type="text/css" media="all">
<link rel="stylesheet" id="flatsome-icons-css" href="./../wp-content/themes/flatsome/assets/css/fl-icons.css?ver=3.3" type="text/css" media="all">
<link rel="stylesheet" id="flatsome-main-css" href="./../wp-content/themes/flatsome/assets/css/flatsome.css?ver=3.8.1" type="text/css" media="all">
<link rel="stylesheet" id="flatsome-style-css" href="./../wp-content/themes/flatsome-child/style.css?ver=3.0" type="text/css" media="all">
<link rel="stylesheet" id="google-fonts-1-css" href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.1.1" type="text/css" media="all">
<script type="text/javascript" src="./../wp-includes/js/jquery/jquery.min.js?ver=3.6.1" id="jquery-core-js"></script><script type="text/javascript" src="./../wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2" id="jquery-migrate-js"></script><link rel="https://api.w.org/" href="./../wp-json/index.php">
<link rel="alternate" type="application/json" href="./../wp-json/wp/v2/pages/357/index.php">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="./../xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="./../wp-includes/wlwmanifest.xml">
<meta name="generator" content="WordPress 6.1.1">
<link rel="canonical" href="./index.php">
<link rel="shortlink" href="./../index.php?p=357">
<link rel="alternate" type="application/json+oembed" href="./../wp-json/oembed/1.0/embed/index.php?url=http%3A%2F%2F%2Fomes%2F">
<link rel="alternate" type="text/xml+oembed" href="./../wp-json/oembed/1.0/embed/index.php?url=http%3A%2F%2F%2Fomes%2F&#038;format=xml">
<style>.bg{opacity: 0; transition: opacity 1s; -webkit-transition: opacity 1s;} .bg-loaded{opacity: 1;}</style>
<!--[if IE]><link rel="stylesheet" type="text/css" href="http://bhemax4it.infinityfreeapp.com/wp-content/themes/flatsome/assets/css/ie-fallback.css"><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script><script>var head = document.getElementsByTagName('head')[0],style = document.createElement('style');style.type = 'text/css';style.styleSheet.cssText = ':before,:after{content:none !important';head.appendChild(style);setTimeout(function(){head.removeChild(style);}, 0);</script><script src="http://bhemax4it.infinityfreeapp.com/wp-content/themes/flatsome/assets/libs/ie-flexibility.js"></script><![endif]--><script type="text/javascript">WebFontConfig = {
      google: { families: [ "Lato:regular,700","Lato:regular,400","Lato:regular,700","Dancing+Script:regular,400", ] }
    };
    (function() {
      var wf = document.createElement('script');
      wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })();</script><link rel="icon" href="./../wp-content/uploads/2022/12/cropped-ICON-32x32.png" sizes="32x32">
<link rel="icon" href="./../wp-content/uploads/2022/12/cropped-ICON-192x192.png" sizes="192x192">
<link rel="apple-touch-icon" href="./../wp-content/uploads/2022/12/cropped-ICON-180x180.png">
<meta name="msapplication-TileImage" content="./../wp-content/uploads/2022/12/cropped-ICON-270x270.png">
<style id="custom-css" type="text/css">:root {--primary-color: #142850;}.header-main{height: 100px}#logo img{max-height: 100px}#logo{width:233px;}.header-bottom{min-height: 10px}.header-top{min-height: 30px}.transparent .header-main{height: 30px}.transparent #logo img{max-height: 30px}.has-transparent + .page-title:first-of-type,.has-transparent + #main > .page-title,.has-transparent + #main > div > .page-title,.has-transparent + #main .page-header-wrapper:first-of-type .page-title{padding-top: 30px;}.header.show-on-scroll,.stuck .header-main{height:70px!important}.stuck #logo img{max-height: 70px!important}.header-bg-color, .header-wrapper {background-color: #142850}.header-bottom {background-color: #f1f1f1}@media (max-width: 549px) {.header-main{height: 70px}#logo img{max-height: 70px}}/* Color */.accordion-title.active, .has-icon-bg .icon .icon-inner,.logo a, .primary.is-underline, .primary.is-link, .badge-outline .badge-inner, .nav-outline > li.active> a,.nav-outline >li.active > a, .cart-icon strong,[data-color='primary'], .is-outline.primary{color: #142850;}/* Color !important */[data-text-color="primary"]{color: #142850!important;}/* Background Color */[data-text-bg="primary"]{background-color: #142850;}/* Background */.scroll-to-bullets a,.featured-title, .label-new.menu-item > a:after, .nav-pagination > li > .current,.nav-pagination > li > span:hover,.nav-pagination > li > a:hover,.has-hover:hover .badge-outline .badge-inner,button[type="submit"], .button.wc-forward:not(.checkout):not(.checkout-button), .button.submit-button, .button.primary:not(.is-outline),.featured-table .title,.is-outline:hover, .has-icon:hover .icon-label,.nav-dropdown-bold .nav-column li > a:hover, .nav-dropdown.nav-dropdown-bold > li > a:hover, .nav-dropdown-bold.dark .nav-column li > a:hover, .nav-dropdown.nav-dropdown-bold.dark > li > a:hover, .is-outline:hover, .tagcloud a:hover,.grid-tools a, input[type='submit']:not(.is-form), .box-badge:hover .box-text, input.button.alt,.nav-box > li > a:hover,.nav-box > li.active > a,.nav-pills > li.active > a ,.current-dropdown .cart-icon strong, .cart-icon:hover strong, .nav-line-bottom > li > a:before, .nav-line-grow > li > a:before, .nav-line > li > a:before,.banner, .header-top, .slider-nav-circle .flickity-prev-next-button:hover svg, .slider-nav-circle .flickity-prev-next-button:hover .arrow, .primary.is-outline:hover, .button.primary:not(.is-outline), input[type='submit'].primary, input[type='submit'].primary, input[type='reset'].button, input[type='button'].primary, .badge-inner{background-color: #142850;}/* Border */.nav-vertical.nav-tabs > li.active > a,.scroll-to-bullets a.active,.nav-pagination > li > .current,.nav-pagination > li > span:hover,.nav-pagination > li > a:hover,.has-hover:hover .badge-outline .badge-inner,.accordion-title.active,.featured-table,.is-outline:hover, .tagcloud a:hover,blockquote, .has-border, .cart-icon strong:after,.cart-icon strong,.blockUI:before, .processing:before,.loading-spin, .slider-nav-circle .flickity-prev-next-button:hover svg, .slider-nav-circle .flickity-prev-next-button:hover .arrow, .primary.is-outline:hover{border-color: #142850}.nav-tabs > li.active > a{border-top-color: #142850}.widget_shopping_cart_content .blockUI.blockOverlay:before { border-left-color: #142850 }.woocommerce-checkout-review-order .blockUI.blockOverlay:before { border-left-color: #142850 }/* Fill */.slider .flickity-prev-next-button:hover svg,.slider .flickity-prev-next-button:hover .arrow{fill: #142850;}/* Background Color */[data-icon-label]:after, .secondary.is-underline:hover,.secondary.is-outline:hover,.icon-label,.button.secondary:not(.is-outline),.button.alt:not(.is-outline), .badge-inner.on-sale, .button.checkout, .single_add_to_cart_button{ background-color:#00a8cc; }[data-text-bg="secondary"]{background-color: #00a8cc;}/* Color */.secondary.is-underline,.secondary.is-link, .secondary.is-outline,.stars a.active, .star-rating:before, .woocommerce-page .star-rating:before,.star-rating span:before, .color-secondary{color: #00a8cc}/* Color !important */[data-text-color="secondary"]{color: #00a8cc!important;}/* Border */.secondary.is-outline:hover{border-color:#00a8cc}body{font-family:"Lato", sans-serif}body{font-weight: 400}body{color: #205375}.nav > li > a {font-family:"Lato", sans-serif;}.nav > li > a {font-weight: 700;}h1,h2,h3,h4,h5,h6,.heading-font, .off-canvas-center .nav-sidebar.nav-vertical > li > a{font-family: "Lato", sans-serif;}h1,h2,h3,h4,h5,h6,.heading-font,.banner h1,.banner h2{font-weight: 700;}h1,h2,h3,h4,h5,h6,.heading-font{color: #112b3c;}.alt-font{font-family: "Dancing Script", sans-serif;}.alt-font{font-weight: 400!important;}a{color: #27496d;}a:hover{color: #0a0a0a;}.tagcloud a:hover{border-color: #0a0a0a;background-color: #0a0a0a;}.absolute-footer, html{background-color: #142850}.label-new.menu-item > a:after{content:"New";}.label-hot.menu-item > a:after{content:"Hot";}.label-sale.menu-item > a:after{content:"Sale";}.label-popular.menu-item > a:after{content:"Popular";}</style>
</head>
<body class="page-template-default page page-id-357 ehf-template-flatsome ehf-stylesheet-flatsome-child header-shadow lightbox nav-dropdown-has-arrow elementor-default elementor-kit-6 elementor-page elementor-page-357">


<a class="skip-link screen-reader-text" href="#main">Skip to content</a>

<div id="wrapper">


<header id="header" class="header header-full-width has-sticky sticky-jump"><div class="header-wrapper">
	<div id="masthead" class="header-main nav-dark">
      <div class="header-inner flex-row container logo-left" role="navigation">

          <!-- Logo -->
          <div id="logo" class="flex-col logo">
            <!-- Header logo -->
<a href="./../index.php" title="Bhemax4IT &#8211; Online Mock Examination System - E-Book Reviewers for Civil Service Eligibility and Licensure Examination for Teachers" rel="home">
    <img width="233" height="100" src="./../wp-content/uploads/2022/12/banner-white.png" class="header_logo header-logo" alt="Bhemax4IT &#8211; Online Mock Examination System"><img width="233" height="100" src="./../wp-content/uploads/2022/12/banner-white.png" class="header-logo-dark" alt="Bhemax4IT &#8211; Online Mock Examination System"></a>
          </div>

          <!-- Mobile Left Elements -->
          <div class="flex-col show-for-medium flex-left">
            <ul class="mobile-nav nav nav-left "></ul>
</div>

          <!-- Left Elements -->
          <div class="flex-col hide-for-medium flex-left
            flex-grow">
            <ul class="header-nav header-nav-main nav nav-left  nav-uppercase"></ul>
</div>

          <!-- Right Elements -->
          <div class="flex-col hide-for-medium flex-right">
            <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
<li class="header-newsletter-item has-icon">

<a href="#header-newsletter-signup" class="tooltip is-small" title="Get Your Access Code Now!">
  	  <i>
	  	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
  <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z"/>
</svg>
	</i>
      <span class="header-newsletter-title hide-for-medium">
      Get Access Code    </span>
  </a><!-- .newsletter-link -->
<div id="header-newsletter-signup" class="lightbox-by-id lightbox-content mfp-hide lightbox-white " style="max-width:700px ;padding:0px">
    
  <div class="banner has-hover" id="banner-842515305">
          <div class="banner-inner fill">
        <div class="banner-bg fill">
            <div class="bg fill bg-fill "></div>
                        <div class="overlay"></div>            
	<div class="is-border is-dashed" style="border-color:rgba(255,255,255,.3);border-width:2px 2px 2px 2px;margin:10px;">
	</div>
                    </div>
<!-- bg-layers -->
        <div class="banner-layers container">
            <div class="fill banner-link"></div>               <div id="text-box-183849049" class="text-box banner-layer x10 md-x10 lg-x10 y50 md-y50 lg-y50 res-text">
                     <div data-animate="fadeInUp">           <div class="text dark">
              
              <div class="text-inner text-left">
                  <h3 class="uppercase">Get Your Access Code Now!</h3>
<p class="lead">By getting your access code, you can pass your exams with ease by using our content.  You will have an opportunity to take advantage of our special offer for getting your access code now!</p>
<div role="form" class="wpcf7" id="wpcf7-f25-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response">
<p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul>
</div>

<form action="index.php" name="token_generate" method="post" class="wpcf7-form init" enctype="multipart/form-data">
	<style>
	/*the container must be positioned relative:*/
	.custom-select {
	  position: relative;
	  font-family: Lato;
	  margin: 1em 0.1em;
	  }

	.custom-select select {
	  display: none; /*hide original SELECT element:*/
	}

	.select-selected {
	  background-color: rgba(20, 40, 80, 0.7);
	  border-radius: 80px;
	}

	/*style the arrow inside the select element:*/
	.select-selected:after {
	  position: absolute;
	  content: "";
	  top: 14px;
	  right: 10px;
	  width: 0;
	  height: 0;
	  border: 6px solid transparent;
	  border-color: #fff transparent transparent transparent;
	}

	/*point the arrow upwards when the select box is open (active):*/
	.select-selected.select-arrow-active:after {
	  border-color: transparent transparent #fff transparent;
	  top: 7px;
	}

	/*style the items (options), including the selected item:*/
	.select-items div,.select-selected {
	  color: #ffffff;
	  padding: 8px 16px;
	  border: 1px solid transparent;
	  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
	  cursor: pointer;
	  user-select: none;
	}

	/*style items (options):*/
	.select-items {
	  position: absolute;
	  background-color: #27496D;
	  border-radius: 20px;
	  top: 100%;
	  left: 0;
	  right: 0;
	  z-index: 99;
	}

	/*hide the items when the select box is closed:*/
	.select-hide {
	  display: none;
	}

	.select-items div:hover, .same-as-selected {
	  background-color: rgba(0, 0, 0, 0.1);
	}
	</style>
	<div style="display: none;">
	<input type="hidden" name="_wpcf7" value="25"><input type="hidden" name="_wpcf7_version" value="5.6.4"><input type="hidden" name="_wpcf7_locale" value="en_US"><input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f25-o1"><input type="hidden" name="_wpcf7_container_post" value="0"><input type="hidden" name="_wpcf7_posted_data_hash" value="">
	</div>
	<div class="form-flat">
		<span class="wpcf7-form-control-wrap" data-name="your-email">
		<div class="custom-select" style="width:200px;">
		  <select name="course" required>
		  <?php
		   require '../connection.php';
		   $query = "SELECT * FROM course";
	       $result = mysqli_query($conn, $query);
	       $x = 1;
	       while($row = mysqli_fetch_array($result)){
	      ?>
		    <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_id']; ?></option>
		  <?php } ?>
		  </select>
		</div>
	</span><br>
		<span class="wpcf7-form-control-wrap" data-name="your-email">
			<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your Email (required)">
		</span><br>
		<span class="wpcf7-form-control-wrap" data-name="your-name">
			<input type="text" name="username" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Username (required)">
		</span><br>
		<input type="submit" name="send_token" value="Send" class="wpcf7-form-control wpcf7-submit">
	</div>
	<div class="wpcf7-response-output" aria-hidden="true"></div>
</form>
</div>              </div>
           </div>
<!-- text-box-inner -->
       </div>                     
<style scope="scope">#text-box-183849049 {
  width: 60%;
}
#text-box-183849049 .text {
  font-size: 100%;
}


@media (min-width:550px) {

  #text-box-183849049 {
    width: 50%;
  }

}</style>
</div>
<!-- text-box -->
         </div>
<!-- .banner-layers -->
      </div>
<!-- .banner-inner -->

            
<style scope="scope">#banner-842515305 {
  padding-top: 600px;
}
#banner-842515305 .bg.bg-loaded {
  background-image: url(./../wp-content/uploads/2022/12/pexels-tatiana-syrikova-3975589-scaled.jpg);
}
#banner-842515305 .overlay {
  background-color: rgba(0,0,0,.4);
}</style>
</div>
<!-- .banner -->

</div>

</li>
<li class="html header-button-1">
	<div class="header-button">
	</div>
</li>


            </ul>
</div>

          <!-- Mobile Right Elements -->
          <div class="flex-col show-for-medium flex-right">
            <ul class="mobile-nav nav nav-right ">
<li class="header-newsletter-item has-icon">

<a href="#header-newsletter-signup" class="tooltip is-small" title="Get Your Access Code Now!">
  
      <i>
		  	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
	  <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4-1v1h1v-1H4Zm1 3v-1H4v1h1Zm7 0v-1h-1v1h1Zm-1-2h1v-1h-1v1Zm-6 3H4v1h1v-1Zm7 1v-1h-1v1h1Zm-7 1H4v1h1v-1Zm7 1v-1h-1v1h1Zm-8 1v1h1v-1H4Zm7 1h1v-1h-1v1Z"/>
	</svg>
		</i>
  
      <span class="header-newsletter-title hide-for-medium">
      Get Access Code    </span>
  </a><!-- .newsletter-link -->
<div id="header-newsletter-signup" class="lightbox-by-id lightbox-content mfp-hide lightbox-white " style="max-width:700px ;padding:0px">
    
  <div class="banner has-hover" id="banner-262280993">
          <div class="banner-inner fill">
        <div class="banner-bg fill">
            <div class="bg fill bg-fill "></div>
                        <div class="overlay"></div>            
	<div class="is-border is-dashed" style="border-color:rgba(255,255,255,.3);border-width:2px 2px 2px 2px;margin:10px;">
	</div>
                    </div>
<!-- bg-layers -->
        <div class="banner-layers container">
            <div class="fill banner-link"></div>               <div id="text-box-2077893654" class="text-box banner-layer x10 md-x10 lg-x10 y50 md-y50 lg-y50 res-text">
                     <div data-animate="fadeInUp">           <div class="text dark">
              
              <div class="text-inner text-left">
                  <h3 class="uppercase">Get Your Access Code Now!</h3>
<p class="lead">By getting your access code, you can pass your exams with ease by using our content.  You will have an opportunity to take advantage of our special offer for getting your access code now!</p>
<div role="form" class="wpcf7" id="wpcf7-f25-o2" lang="en-US" dir="ltr">
<div class="screen-reader-response">
<p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul>
</div>
<?php
	if(isset($_POST['send_token'])){
		require '../connection.php';
		require '../email/vendor/autoload.php'; 
		require '../functions.php';
		include '../email/email_token.php';
	}
?>
<form action="index.php" name="token_generate" method="post" class="wpcf7-form init" enctype="multipart/form-data">
	<div class="custom-select" style="width:200px;">
	  <select name="course" required>
	    <option value="0">Select Course:</option>
	  <?php
	   require '../connection.php';
	   $query = "SELECT * FROM course";
       $result = mysqli_query($conn, $query);
       $x = 1;
       while($row = mysqli_fetch_array($result)){
      ?>
	    <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_id']; ?></option>
	  <?php } ?>
	  </select>
	</div>
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="25"><input type="hidden" name="_wpcf7_version" value="5.6.4"><input type="hidden" name="_wpcf7_locale" value="en_US"><input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f25-o2"><input type="hidden" name="_wpcf7_container_post" value="0"><input type="hidden" name="_wpcf7_posted_data_hash" value="">
</div>
<div class="form-flat">
	<span class="wpcf7-form-control-wrap" data-name="your-email">
		<input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your Email (required)"></span>
		<br>
	<span class="wpcf7-form-control-wrap" data-name="your-name">
		<input type="text" name="username" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your Username (required)">
	</span>
	<br>
	<input type="submit" name="send_token" value="Send" class="wpcf7-form-control wpcf7-submit">
</div>
<div class="wpcf7-response-output" aria-hidden="true"></div>
</form>
</div>              </div>
           </div>
<!-- text-box-inner -->
       </div>                     
<style scope="scope">#text-box-2077893654 {
  width: 60%;
}
#text-box-2077893654 .text {
  font-size: 100%;
}


@media (min-width:550px) {

  #text-box-2077893654 {
    width: 50%;
  }

}</style>
</div>
<!-- text-box -->
         </div>
<!-- .banner-layers -->
      </div>
<!-- .banner-inner -->

            
<style scope="scope">#banner-262280993 {
  padding-top: 600px;
}
#banner-262280993 .bg.bg-loaded {
  background-image: url(./../wp-content/uploads/2022/12/pexels-tatiana-syrikova-3975589-scaled.jpg);
}
#banner-262280993 .overlay {
  background-color: rgba(0,0,0,.4);
}</style>
</div>
<!-- .banner -->

</div>

</li>
<li class="html header-button-2">
	<div class="header-button">
	</div>
</li>
            </ul>
</div>

      </div>
<!-- .header-inner -->
     
            <!-- Header divider -->
      <div class="container"><div class="top-divider full-width"></div></div>
      </div>
<!-- .header-main -->
<div class="header-bg-container fill">
<div class="header-bg-image fill"></div>
<div class="header-bg-color fill"></div>
</div>
<!-- .header-bg-container -->   </div>
<!-- header-wrapper-->
</header><main id="main" class=""><div id="content" class="content-area page-wrapper" role="main">
	<div class="row row-main">
		<div class="large-12 col">
			<div class="col-inner">
				
				
														
								<div data-elementor-type="wp-page" data-elementor-id="357" class="elementor elementor-357">
									<section class="elementor-section elementor-top-section elementor-element elementor-element-a0e5485 elementor-section-height-min-height elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-items-middle" data-id="a0e5485" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}"><div class="elementor-background-overlay"></div>
							<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-852ec31 elementor-invisible" data-id="852ec31" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;bounceInDown&quot;}">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-dea28ff elementor-widget elementor-widget-image" data-id="dea28ff" data-element_type="widget" data-widget_type="image.default">
				<div class="elementor-widget-container">
			<style>/*! elementor - v3.8.0 - 30-10-2022 */
.elementor-widget-image{text-align:center}.elementor-widget-image a{display:inline-block}.elementor-widget-image a img[src$=".svg"]{width:48px}.elementor-widget-image img{vertical-align:middle;display:inline-block}</style>
<img decoding="async" width="1020" height="214" src="./../wp-content/uploads/2022/12/banner-1400x294.png" class="attachment-large size-large" alt="" loading="lazy" srcset="./../wp-content/uploads/2022/12/banner-1400x294.png 1400w, ./../wp-content/uploads/2022/12/banner-800x168.png 800w, ./../wp-content/uploads/2022/12/banner-768x161.png 768w, ./../wp-content/uploads/2022/12/banner-1536x322.png 1536w, ./../wp-content/uploads/2022/12/banner-2048x429.png 2048w, ./../wp-content/uploads/2022/12/banner-600x126.png 600w" sizes="(max-width: 1020px) 100vw, 1020px">
</div>
				</div>
				<div class="elementor-element elementor-element-58d2bf7 elementor-button-align-stretch e-transform elementor-mobile-button-align-center elementor-widget elementor-widget-login" data-id="58d2bf7" data-element_type="widget" data-settings="{&quot;_transform_translateX_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateX_effect_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateX_effect_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateY_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateY_effect_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateY_effect_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="login.default">
				<div class="elementor-widget-container">
			<style>/*! elementor-pro - v3.8.0 - 30-10-2022 */
.elementor-button.elementor-hidden,.elementor-hidden{display:none}.e-form__step{width:100%}.e-form__step:not(.elementor-hidden){display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap}.e-form__buttons{-ms-flex-wrap:wrap;flex-wrap:wrap}.e-form__buttons,.e-form__buttons__wrapper{display:-webkit-box;display:-ms-flexbox;display:flex}.e-form__indicators{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-ms-flex-wrap:nowrap;flex-wrap:nowrap;font-size:13px;margin-bottom:var(--e-form-steps-indicators-spacing)}.e-form__indicators,.e-form__indicators__indicator{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.e-form__indicators__indicator{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-ms-flex-preferred-size:0;flex-basis:0;padding:0 var(--e-form-steps-divider-gap)}.e-form__indicators__indicator__progress{width:100%;position:relative;background-color:var(--e-form-steps-indicator-progress-background-color);border-radius:var(--e-form-steps-indicator-progress-border-radius);overflow:hidden}.e-form__indicators__indicator__progress__meter{width:var(--e-form-steps-indicator-progress-meter-width,0);height:var(--e-form-steps-indicator-progress-height);line-height:var(--e-form-steps-indicator-progress-height);padding-right:15px;border-radius:var(--e-form-steps-indicator-progress-border-radius);background-color:var(--e-form-steps-indicator-progress-color);color:var(--e-form-steps-indicator-progress-meter-color);text-align:right;-webkit-transition:width .1s linear;-o-transition:width .1s linear;transition:width .1s linear}.e-form__indicators__indicator:first-child{padding-left:0}.e-form__indicators__indicator:last-child{padding-right:0}.e-form__indicators__indicator--state-inactive{color:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-inactive [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-inactive-secondary-color,#fff)}.e-form__indicators__indicator--state-inactive object,.e-form__indicators__indicator--state-inactive svg{fill:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-active{color:var(--e-form-steps-indicator-active-primary-color,#39b54a);border-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active object,.e-form__indicators__indicator--state-active svg{fill:var(--e-form-steps-indicator-active-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed{color:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator--state-completed [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator__label{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator--shape-none{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a);background-color:initial}.e-form__indicators__indicator--state-completed object,.e-form__indicators__indicator--state-completed svg{fill:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator__icon{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);font-size:var(--e-form-steps-indicator-icon-size);border-width:1px;border-style:solid;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;overflow:hidden;margin-bottom:10px}.e-form__indicators__indicator__icon img,.e-form__indicators__indicator__icon object,.e-form__indicators__indicator__icon svg{width:var(--e-form-steps-indicator-icon-size);height:auto}.e-form__indicators__indicator__icon .e-font-icon-svg{height:1em}.e-form__indicators__indicator__number{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);border-width:1px;border-style:solid;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin-bottom:10px}.e-form__indicators__indicator--shape-circle{border-radius:50%}.e-form__indicators__indicator--shape-square{border-radius:0}.e-form__indicators__indicator--shape-rounded{border-radius:5px}.e-form__indicators__indicator--shape-none{border:0}.e-form__indicators__indicator__label{text-align:center}.e-form__indicators__indicator__separator{width:100%;height:var(--e-form-steps-divider-width);background-color:#c2cbd2}.e-form__indicators--type-icon,.e-form__indicators--type-icon_text,.e-form__indicators--type-number,.e-form__indicators--type-number_text{-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start}.e-form__indicators--type-icon .e-form__indicators__indicator__separator,.e-form__indicators--type-icon_text .e-form__indicators__indicator__separator,.e-form__indicators--type-number .e-form__indicators__indicator__separator,.e-form__indicators--type-number_text .e-form__indicators__indicator__separator{margin-top:calc(var(--e-form-steps-indicator-padding, 30px) / 2 - var(--e-form-steps-divider-width, 1px) / 2)}.elementor-field-type-hidden{display:none}.elementor-field-type-html{display:inline-block}.elementor-login .elementor-lost-password,.elementor-login .elementor-remember-me{font-size:.85em}.elementor-field-type-recaptcha_v3 .elementor-field-label{display:none}.elementor-field-type-recaptcha_v3 .grecaptcha-badge{z-index:1}.elementor-button .elementor-form-spinner{-webkit-box-ordinal-group:4;-ms-flex-order:3;order:3}.elementor-form .elementor-button>span{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.elementor-form .elementor-button .elementor-button-text{white-space:normal;-webkit-box-flex:0;-ms-flex-positive:0;flex-grow:0}.elementor-form .elementor-button svg{height:auto}.elementor-form .elementor-button .e-font-icon-svg{height:1em}.elementor-select-wrapper .select-caret-down-wrapper{position:absolute;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%);inset-inline-end:10px;pointer-events:none;font-size:11px}.elementor-select-wrapper .select-caret-down-wrapper svg{display:unset;width:1em;aspect-ratio:unset;fill:currentColor}.elementor-select-wrapper .select-caret-down-wrapper i{font-size:19px;line-height:2}.elementor-select-wrapper.remove-before:before{content:""!important}</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#submit_login").on("submit", function(event) {
        event.preventDefault();
        var formValues = $(this).serialize();

        $.post("validate.php", formValues, function(data) {
            $("#message_login").html(data);
        });
    });
});
</script>

<form class="elementor-login elementor-form" id="submit_login" name="login" method="post">
    <div class="elementor-form-fields-wrapper">
        <div class="elementor-field-type-text elementor-field-group elementor-column elementor-col-100 elementor-field-required">
            <label align="center" style="color: red;" for="user">
                <div id="message_login"></div>
            </label>
            <input size="1" type="username" name="username" id="username" placeholder="Email Address or Username" class="elementor-field elementor-field-textual elementor-size-sm" required />
        </div>
        <div class="elementor-field-type-text elementor-field-group elementor-column elementor-col-100 elementor-field-required">
            <label for="password"></label>
            <input size="1" type="password" name="password" id="password" placeholder="Token" class="elementor-field elementor-field-textual elementor-size-sm" required />
        </div>
        <div class="elementor-field-type-checkbox elementor-field-group elementor-column elementor-col-100 elementor-remember-me">
            <label for="elementor-login-remember-me">
                <small> <input type="checkbox" id="elementor-login-remember-me" name="rememberme" value="forever" /> Remember Me </small>
            </label>
        </div>
        <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100">
            <button type="submit" name="submit_login" class="elementor-size-sm elementor-animation-bounce-in elementor-button" name="wp-submit">
                <span class="elementor-button-text">Log In</span>
            </button>
        </div>
    </div>
</form>

				</div>
				</div>
					</div>
		</div>
							</div>
		</section>
</div>
		
						
												</div>
<!-- .col-inner -->
		</div>
<!-- .large-12 -->
	</div>
<!-- .row -->
</div>


</main><!-- #main --><footer id="footer" class="footer-wrapper"><!-- FOOTER 1 --><!-- FOOTER 2 --><div class="absolute-footer dark medium-text-center text-center">
  <div class="container clearfix">

    
    <div class="footer-primary pull-left">
            <div class="copyright-footer">
        Copyright 2022 © <strong>Bhemax4IT</strong>      </div>
          </div>
<!-- .left -->
  </div>
<!-- .container -->
</div>
<!-- .absolute-footer -->
<a href="#top" class="back-to-top button icon invert plain fixed bottom z-1 is-outline hide-for-medium circle" id="top-link"><i class="icon-angle-up"></i></a>

</footer><!-- .footer-wrapper -->
</div>
<!-- #wrapper -->

<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar text-center">
        <ul class="nav nav-sidebar nav-anim nav-vertical nav-uppercase">
<li><a href="./../wp-admin/customize.php?url=http:///omes/&autofocus%5Bsection%5D=menu_locations">Assign a menu in Theme Options > Menus</a></li>WooCommerce not Found<li class="header-search-form search-form html relative has-icon">
	<div class="header-search-form-wrapper">
		<div class="searchform-wrapper ux-search-box relative is-normal">
<form method="get" class="searchform" action="http://bhemax4it.infinityfreeapp.com/" role="search">
		<div class="flex-row relative">
			<div class="flex-col flex-grow">
	   	   <input type="search" class="search-field mb-0" name="s" value="" id="s" placeholder="Search&hellip;">
</div>
<!-- .flex-col -->
			<div class="flex-col">
				<button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
					<i class="icon-search"></i>				</button>
			</div>
<!-- .flex-col -->
		</div>
<!-- .flex-row -->
    <div class="live-search-results text-left z-top"></div>
</form>
</div>	</div>
</li>        </ul>
</div>
<!-- inner -->
</div>
<!-- #mobile-menu -->
<script>
	var x, i, j, l, ll, selElmnt, a, b, c;
	/*look for any elements with the class "custom-select":*/
	x = document.getElementsByClassName("custom-select");
	l = x.length;
	for (i = 0; i < l; i++) {
	  selElmnt = x[i].getElementsByTagName("select")[0];
	  ll = selElmnt.length;
	  /*for each element, create a new DIV that will act as the selected item:*/
	  a = document.createElement("DIV");
	  a.setAttribute("class", "select-selected");
	  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	  x[i].appendChild(a);
	  /*for each element, create a new DIV that will contain the option list:*/
	  b = document.createElement("DIV");
	  b.setAttribute("class", "select-items select-hide");
	  for (j = 1; j < ll; j++) {
	    /*for each option in the original select element,
	    create a new DIV that will act as an option item:*/
	    c = document.createElement("DIV");
	    c.innerHTML = selElmnt.options[j].innerHTML;
	    c.addEventListener("click", function(e) {
	        /*when an item is clicked, update the original select box,
	        and the selected item:*/
	        var y, i, k, s, h, sl, yl;
	        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
	        sl = s.length;
	        h = this.parentNode.previousSibling;
	        for (i = 0; i < sl; i++) {
	          if (s.options[i].innerHTML == this.innerHTML) {
	            s.selectedIndex = i;
	            h.innerHTML = this.innerHTML;
	            y = this.parentNode.getElementsByClassName("same-as-selected");
	            yl = y.length;
	            for (k = 0; k < yl; k++) {
	              y[k].removeAttribute("class");
	            }
	            this.setAttribute("class", "same-as-selected");
	            break;
	          }
	        }
	        h.click();
	    });
	    b.appendChild(c);
	  }
	  x[i].appendChild(b);
	  a.addEventListener("click", function(e) {
	      /*when the select box is clicked, close any other select boxes,
	      and open/close the current select box:*/
	      e.stopPropagation();
	      closeAllSelect(this);
	      this.nextSibling.classList.toggle("select-hide");
	      this.classList.toggle("select-arrow-active");
	    });
	}
	function closeAllSelect(elmnt) {
	  /*a function that will close all select boxes in the document,
	  except the current select box:*/
	  var x, y, i, xl, yl, arrNo = [];
	  x = document.getElementsByClassName("select-items");
	  y = document.getElementsByClassName("select-selected");
	  xl = x.length;
	  yl = y.length;
	  for (i = 0; i < yl; i++) {
	    if (elmnt == y[i]) {
	      arrNo.push(i)
	    } else {
	      y[i].classList.remove("select-arrow-active");
	    }
	  }
	  for (i = 0; i < xl; i++) {
	    if (arrNo.indexOf(i)) {
	      x[i].classList.add("select-hide");
	    }
	  }
	}
	/*if the user clicks anywhere outside the select box,
	then close all select boxes:*/
	document.addEventListener("click", closeAllSelect);
	</script>



<link rel="stylesheet" id="e-animations-css" href="./../wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.8.0" type="text/css" media="all">
<script type="text/javascript" src="./../wp-content/themes/flatsome/inc/extensions/flatsome-live-search/flatsome-live-search.js?ver=3.8.1" id="flatsome-live-search-js"></script><script type="text/javascript" src="./../wp-includes/js/hoverIntent.min.js?ver=1.10.2" id="hoverIntent-js"></script><script type="text/javascript" id="flatsome-js-js-extra">
/* <![CDATA[ */
var flatsomeVars = {"ajaxurl":".\/wp-admin\/admin-ajax.php","rtl":"","sticky_height":"70","user":{"can_edit_pages":false}};
/* ]]> */
</script><script type="text/javascript" src="./../wp-content/themes/flatsome/assets/js/flatsome.js?ver=3.8.1" id="flatsome-js-js"></script><script type="text/javascript" src="./../wp-content/plugins/elementor-pro/assets/js/webpack-pro.runtime.min.js?ver=3.8.0" id="elementor-pro-webpack-runtime-js"></script><script type="text/javascript" src="./../wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.8.0" id="elementor-webpack-runtime-js"></script><script type="text/javascript" src="./../wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.8.0" id="elementor-frontend-modules-js"></script><script type="text/javascript" src="./../wp-includes/js/dist/vendor/regenerator-runtime.min.js?ver=0.13.9" id="regenerator-runtime-js"></script><script type="text/javascript" src="./../wp-includes/js/dist/vendor/wp-polyfill.min.js?ver=3.15.0" id="wp-polyfill-js"></script><script type="text/javascript" src="./../wp-includes/js/dist/hooks.min.js?ver=4169d3cf8e8d95a3d6d5" id="wp-hooks-js"></script><script type="text/javascript" src="./../wp-includes/js/dist/i18n.min.js?ver=9e794f35a71bb98672ae" id="wp-i18n-js"></script><script type="text/javascript" id="wp-i18n-js-after">
wp.i18n.setLocaleData( { 'text directionltr': [ 'ltr' ] } );
</script><script type="text/javascript" id="elementor-pro-frontend-js-before">var ElementorProFrontendConfig = {"ajaxurl":".\/wp-admin\/admin-ajax.php","nonce":"13ee417862","urls":{"assets":".\/wp-content\/plugins\/elementor-pro\/assets\/","rest":".\/wp-json\/"},"shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"mix":{"title":"Mix"},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"}},"facebook_sdk":{"lang":"en_US","app_id":""},"lottie":{"defaultAnimationUrl":".\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"}};</script><script type="text/javascript" src="./../wp-content/plugins/elementor-pro/assets/js/frontend.min.js?ver=3.8.0" id="elementor-pro-frontend-js"></script><script type="text/javascript" src="./../wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2" id="elementor-waypoints-js"></script><script type="text/javascript" src="./../wp-includes/js/jquery/ui/core.min.js?ver=1.13.2" id="jquery-ui-core-js"></script><script type="text/javascript" id="elementor-frontend-js-before">var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Extra","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Extra","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.8.0","is_static":false,"experimentalFeatures":{"e_dom_optimization":true,"e_optimized_assets_loading":true,"e_optimized_css_loading":true,"a11y_improvements":true,"additional_custom_breakpoints":true,"e_import_export":true,"e_hidden_wordpress_widgets":true,"theme_builder_v2":true,"landing-pages":true,"elements-color-picker":true,"favorite-widgets":true,"admin-top-bar":true,"page-transitions":true,"notes":true,"loop":true,"form-submissions":true,"e_scroll_snap":true},"urls":{"assets":".\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":357,"title":"OMES%20%E2%80%93%20Bhemax4IT%20%E2%80%93%20Online%20Mock%20Examination%20System","excerpt":"","featuredImage":false}};</script><script type="text/javascript" src="./../wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.8.0" id="elementor-frontend-js"></script><script type="text/javascript" src="./../wp-content/plugins/elementor-pro/assets/js/elements-handlers.min.js?ver=3.8.0" id="pro-elements-handlers-js"></script>
</body>
</html>


<script src="../sweetalert/dist/sweetalert2.min.js"></script>

<?php 
if(isset($message_email)){
	echo $message_email;
}
?>