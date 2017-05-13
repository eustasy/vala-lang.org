<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Vala Language</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:300|Droid+Serif:400|Droid+Sans:400,700|Droid+Sans+Mono">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/g/normalize,colors.css">
		<link rel="stylesheet" href="vertigrid.css">
		<link rel="stylesheet" href="vala.css">
		<link rel="shortcut icon" href="favicon.ico">
		<script>
			var jQl={q:[],dq:[],gs:[],ready:function(e){return'function'==typeof e&&jQl.q.push(e),jQl},getScript:function(e,n){jQl.gs.push([e,n])},unq:function(){for(var e=0;e<jQl.q.length;e++)jQl.q[e]();jQl.q=[]},ungs:function(){for(var e=0;e<jQl.gs.length;e++)jQuery.getScript(jQl.gs[e][0],jQl.gs[e][1]);jQl.gs=[]},bId:null,boot:function(e){return'undefined'==typeof window.jQuery.fn?void(jQl.bId||(jQl.bId=setInterval(function(){jQl.boot(e)},25))):(jQl.bId&&clearInterval(jQl.bId),jQl.bId=0,jQl.unqjQdep(),jQl.ungs(),jQuery(jQl.unq),void('function'==typeof e&&e()))},booted:function(){return 0===jQl.bId},loadjQ:function(e,n){setTimeout(function(){var n=document.createElement('script');n.src=e,document.getElementsByTagName('head')[0].appendChild(n)},1),jQl.boot(n)},loadjQdep:function(e){jQl.loadxhr(e,jQl.qdep)},qdep:function(e){e&&('undefined'==typeof window.jQuery.fn||jQl.dq.length?jQl.dq.push(e):jQl.rs(e))},unqjQdep:function(){if('undefined'==typeof window.jQuery.fn)return void setTimeout(jQl.unqjQdep,50);for(var e=0;e<jQl.dq.length;e++)jQl.rs(jQl.dq[e]);jQl.dq=[]},rs:function(e){var n=document.createElement('script');document.getElementsByTagName('head')[0].appendChild(n),n.text=e},loadxhr:function(e,n){var t;t=jQl.getxo(),t.onreadystatechange=function(){4==t.readyState&&200==t.status&&n(t.responseText,e)};try{t.open('GET',e,!0),t.send('')}catch(o){}},getxo:function(){var e=!1;try{e=new XMLHttpRequest}catch(n){for(var t=['MSXML2.XMLHTTP.5.0','MSXML2.XMLHTTP.4.0','MSXML2.XMLHTTP.3.0','MSXML2.XMLHTTP','Microsoft.XMLHTTP'],o=0;o<t.length;++o){try{e=new ActiveXObject(t[o])}catch(n){continue}break}}finally{return e}}};if('undefined'==typeof window.jQuery){var $=jQl.ready,jQuery=$;$.getScript=jQl.getScript}
			jQl.loadjQ('//cdn.jsdelivr.net/g/jquery');
		</script>
		<script async>
			$(function() {

				/* Compact the FarHeader on Scroll */

				var yoff = 0,
					last = 0,

					tolerance = 10,
					// How far can you scroll back without triggering?
					// Stops odd in-out-in-out on drag because humans.
					// Standard step appears to be 40 or 20, 10 looks good.

					body = $('body'),
					header = $('header'),
					farheader = $('.js-target-scroll-toggle');

				header.css('position', 'fixed').css('top', '0px');
				body.css('padding-top', '128px');

				var scroll = function() {

					if (last != 1 && window.pageYOffset > yoff+tolerance) {
						console.log('Scrolled down.');
						farheader.slideUp(500);
						body.css('padding-top', '56px');
						last = 1;

					} else if (last != 2 && window.pageYOffset < yoff-tolerance) {
						console.log('Scrolled up.');
						farheader.slideDown(500);
						body.css('padding-top', '128px');
						last = 2;
					}

					yoff = window.pageYOffset;

				};

				$(window).scroll(scroll);
				scroll();

			});
		</script>
		<script async>
			$(function() {
				/* Leave Search larger if it has "value" */
				var searchtext = $('.search-text');
				searchtext.blur(function() {
					if (searchtext.val() != '') searchtext.css('width', '311px');
					else searchtext.css('width', '');
				});
			});
		</script>
	</head>
	<body>
		<header>
			<aside class="color-white back-vala-darker">
				<div class="container padding-0 js-target-scroll-toggle">
					<h1 class="display-inline"><a href="http://vala-lang.org/">Vala</a></h1></li>
					<p class="display-inline margin-0">a programming language</p>
					<ul class="menu horizontal display-inline float-right">
						<li><a class="current" href="#">Download</a></li>
						<li><a href="/learn">Learn</a></li>
						<li><a href="https://vala-docs.org/">Docs</a></li>
						<li><a href="/news">News</a></li>
					</ul>
				</div>
			</aside>
			<aside class="color-white back-vala-darkest">
				<div class="container align-right">
					<p class="breadcrumbs color-clouds display-inline float-left"><a href="/">Vala</a>&emsp;&rsaquo;&emsp;<a href="/download">Download</a></p>
					<form id="search" action="https://www.google.com/search" method="get">
						<input id="search-text" class="search-text back-white color-3" type="text" placeholder="Search" name="q" autocomplete="off">
						<input id="search-text" class="search-icon" type="submit" value="">
					</form>
				</div>
			</aside>
		</header>
		<section class="back-white">
			<div class="container padding-vertical-0">
				<div class="row cover">
					<div class="cover-block p2 s2 align-center">
						<h1>Vala</h1>
						<p style="margin-top: 0;">a programing language</p>
						<?php
							require __DIR__.'/_cache/latest_version.php';
							$Size = number_format($Cache['Download']['Size']/1024/1024, 1);
							echo '
							<a href="'.$Cache['Download']['Location'].'">
								<div class="button margin-auto color-white">
									<h3 class="color-inherit margin-0">Download</h3>
									<p class="margin-0"><small>Version '.$Cache['Version'].' &nbsp;&mdash;&nbsp; '.$Size.' MB
									</small></p>
								</div>
							</a>';
						?>
					</div>
				</div>
			</div>
		</section>
		<section class="back-alternate">
			<div class="container">
				<div class="row">
					<div class="s2">
						<h2>Compatible</h2>
						<p>Vala is a new programming language that aims to bring modern programming language features to GNOME developers without imposing any additional runtime requirements and without using a different ABI compared to applications and libraries written in C. The performance should be pretty similar to GObject/C-based code as there is no Vala-specific runtime library/environment that needs to be loaded.</p>
					</div>
					<div class="s2">
						<h2>&emsp;</h2>
						<p>Vala is designed for GObject, this makes it easy to develop GObject-based libraries with Vala that can be used from a variety of other languages and runtime environments just like all the other GObject-based libraries out there. We want to use the same syntax as C# wherever it makes sense to keep the entry barrier low.</p>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
				<div class="row">
					<div class="s2">
						<h2>1914 Translation by H. Rackham</h2>
						<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>
					</div>
					<div class="s2">
						<h3>Another</h4>
						<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammeled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>
					</div>
				</div>
			</div>
		</section>
		<section class="back-alternate">
			<div class="container">
				<div class="row">
					<div class="s4">
						<h2>News</h2>
					</div>
					<div class="s2">
						<h3>0.30.0 Released</h3>
						<p><em>September 18<sup>th</sup>, 2015</em></p>
						<ul>
							<li>Binding updates.
							<li>gtk+-3.0: Update to 3.17.8+d5f17549
							<li>vapi: Update GIR-based bindings
							<li>gtk+-3.0: Make callback-scope async according to introspection annoations
							<li>glib-2.0: add new symbols for 2.46
							<li>vapi: Update GIR-based bindings
							<li>gtk+-2.0: add scope async to Gtk.Clipboard request/set_with methods
							<li>gtk+-3.0: add scope async to Gtk.Clipboard request/set_with methods
							<li>gtk+-3.0: use wildcard for Gtk.Clipboard request methods
							<li>gtk+-3.0: lt-vapigen -> vapigen
							<li>gtk+-3.0: add scope async to Gtk.Clipboard request methods
							<li>vapi: Update GIR-based bindings
							<li>webkit2gtk-4.0: Update to 2.9.90
							<li>gtk+-3.0: Update to 3.17.7
							<li>posix: add PrintfFormat to syslog()
							<li>Fixes bug <a href="https://bugzilla.gnome.org/show_bug.cgi?id=752031">#752031</a>
						</ul>
					</div>
					<div class="s2">
						<h3>0.29.3 Released</h3>
						<p><em>August 11<sup>th</sup>, 2015</em></p>
						<ul>
							<li>dd --shared-library option for GIR files.
							<li>Bug fixes and binding updates.
							<li>Set gir_shared_library argument to be null by default, avoid breaking API
							<li>Add --shared-library option for GIR files
							<li>Fixes bug 585116
							<li>vapi: Update GIR-based bindings
							<li>webkit2gtk-4.0: Update to 2.9.5
							<li>gtk+-3.0: Update to 3.17.5+e34ab356
							<li>glib-2.0: make DirUtils.mkdtemp transfer ownership
							<li>webkit2gtk-4.0: Update to 2.9.4
							<li>glib-2.0: added g_get_user_runtime_dir ()
							<li>This has been in GLib since 2.28
							<li>vapi: Update GIR-based bindings
							<li>gtk+-3.0: Update to 3.17.5
							<li>gtk+-3.0: Update to 3.17.4+abc47d7f
							<li>gtk+-3.0: Further syncing with introspection annotations
							<li>gio-unix-2.0: Fix binding of g_desktop_app_info_launch_uris_as_manager
							<li>https://bugzilla.gnome.org/show_bug.cgi?id=748828
							<li>gtk+3.0: Properly specify argument of Widget.touch_event as Gdk.EventTouch
							<li>codegen: check for null value before calling g_strv_length
							<li>Fixes bug <a href="https://bugzilla.gnome.org/show_bug.cgi?id=751338">#751338</a>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<aside class="color-clouds back-vala-dark">
				<div class="container">
					<div class="row">
						<div class="s1">
							<h3>Downloads</h3>
							<p><a href="https://download.gnome.org/sources/vala/VERSION/VERSION.tar.xz">Latest Version</a></p>
							<p><a href="https://launchpad.net/~vala-team/+archive/ubuntu/ppa">Vala PPA</a>
							<p><a href="https://download.gnome.org/sources/vala/">Browse Versions</a></p>
							<p><a href="https://git.gnome.org/browse/vala/">Development</a></p>
						</div>
						<div class="s1">
							<h3>Docs</h3>
							<p><a href="http://live.gnome.org/Vala/FAQ">FAQ</a></p>
							<p><a href="http://www.valadoc.org/">ValaDoc.org</a></p>
							<p><a href="https://wiki.gnome.org/Projects/Vala/DeveloperDocumentation">For Developers</a></p>
							<p><a href="https://wiki.gnome.org/Projects/Vala/Documentation">Further Reading</a></p>
						</div>
						<div class="s1">
							<h3>Bugs</h3>
							<p><a href="https://bugzilla.gnome.org/browse.cgi?product=vala">Bug Tracker</a></p>
							<p><a href="https://wiki.gnome.org/Projects/Vala/Planning">Planning</a></p>
							<p><a href="https://wiki.gnome.org/Projects/Vala/Features">Feature Status</a>
						</div>
						<div class="s1">
							<h3>News</h3>
							<p><a href="http://valajournal.blogspot.com/">Journal</a></p>
							<p><a href="https://mail.gnome.org/mailman/listinfo/vala-list">Mailing List</a></p>
							<p><a href="https://wiki.gnome.org/Projects/Vala/Release">Changelog</a></p>
						</div>
					</div>
				</div>
			</aside>
			<aside class="color-clouds back-vala-darker">
				<div class="container">
					<p>Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.gnome.org/">The GNOME Project</a><span class="float-right">Website by <a href="https://eustasy.org/">eustasy <img src="https://eustasy.org/images/eustasy-light.png"></a></span></p>
				</div>
			</aside>
		</footer>
	</body>
</html>
