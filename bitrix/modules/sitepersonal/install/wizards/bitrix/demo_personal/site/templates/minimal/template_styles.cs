﻿* { font-size:100%; }

html, body { height:100%; width:100%; }

body 
{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size:62.5%;
	min-height:100%;
	margin:0;
	padding:0;
}
form { margin:0; padding:0;}
form.main-form {  height:100%;}

/*Page Layout */
#grid { width: 950px; height: 100%; font-size: 125%; }
#header-row { height: 85px; vertical-align: middle; position: relative;}
#menu-row { height: 45px; }
#content
{ 
	font-size:100%;
	line-height:1.4 !important;
	vertical-align: top;
	padding:25px 25px 25px 0;
}
#content-wrapper { width: 700px;}
#sidebar { padding:25px 0 20px; vertical-align: top; width: 250px; }
#footer-row { height:57px; }

#header { position: relative; height: 100%;}

#title
{
	position: absolute;
	font-family: Georgia,serif;
	top:23px;
	padding:0;
	margin:0;
	width:760px;
	font-size:2.5em;
	white-space: nowrap;
	overflow:hidden;
}

#title a, #title a:hover { text-decoration: none; outline: none;}

/* Top Menu */
#top-menu
{
	position:relative;
	zoom:1;
	height:45px;
}

	#top-menu li a
	{
		 text-decoration: none;
		 font-size: 1.8em;
		 line-height: 1.9;
		 font-family: Georgia,serif;
		 font-weight:bold;
		 float:left;
		 height: 45px;
		 padding: 0 1em;
		 outline: none;
	}
	
	#top-menu b { position:absolute; left:0; right:0; zoom:1; margin:0; border-left:1px solid; border-right:1px solid; }
	#top-menu b.r1 { top:0; }
	#top-menu b.r2 { bottom:0; }

	#top-menu ul {
		margin:0 160px 0 2.5em;
		padding:0;
		z-index: 1;	
		height:45px;
		overflow: hidden;
	}

		#top-menu ul li {
			list-style: none;
			float: left;
			margin: 0;
			height:45px;
		}

#top-menu a:hover { text-decoration: underline;}

#rss-link  
{
	position: absolute; 
	right:12px; 
	top:0;
	background: transparent url(images/rss_icon.gif) no-repeat left center; 
	height: 45px;
	line-height: 45px;
	padding-left: 25px;
	text-decoration: none;
}

#search { position:absolute; right:0; top: 37px; width:185px; }
#search div.rounded-box { float: left; width:130px;}
								 
#search div.search-inner-box
{
	border-left: 1px solid; 
	border-right: 1px solid; 
	padding-left: 20px;
	background: white url(images/loupe.gif) no-repeat 4px 4px;
	height: 20px;
	overflow:hidden;
}

#search div.search-inner-box input
{
	border:none;
	width: 105px;
	height: 20px;
	padding:0;
	margin:0;
}

#search input { vertical-align: top;}
#search-button { float: right; }
#search-button div.search-button-box { float: left; width:50px;}
#search-button div.search-button-inner-box { border-left: 1px solid; border-right: 1px solid; height: 20px; overflow:hidden; }
#search-button input::-moz-focus-inner { border: 0; padding: 0; }/*Remove button padding in FF*/
#search-button input 
{
	display: block;
	border: none;
	width:50px;
	padding:0;
	margin:0;
	font-family: Georgia, serif;
	font-size: 12px;
	height: 20px;
	cursor: pointer;
	cursor: hand;
	outline: none;	
}

#footer { height: 56px; border-left:1px solid; border-right:1px solid; position: relative;}
#copyright { padding: 1em 2em;  width:40%;}
#footer-links { width:50%; position:absolute; right:2em; top: 1em; margin:0; padding:0; list-style: none; text-align: right;}
#footer-links li { display: inline; padding-left:1.5em;}

div.sidebar-rounded-box {height:100%; width:250px; position: relative;}
div.sidebar-rounded-box h3 { font-size: 140%;}
div.sidebar-rounded-box b { margin:0; border-left: 1px solid; border-right: 1px solid; }
div.sidebar-rounded-box b.r2 { position:absolute; bottom: 0; left:0; right:0; }
div.sidebar-rounded-box div.inner-box { padding: 2em 2em; }
div.sidebar-rounded-box .hr {margin: 15px 0;}

/* User-menu */
#user-menu { margin:0; padding:0 1em; list-style: none; padding-bottom: 1.5em;}
#user-menu li { display: block; padding: 0.8em 1em; border-top: 1px solid; font-family: Georgia, serif;}
#user-menu li.last-item { border-bottom: 1px solid;}
#user-menu li a { text-decoration: none; font-size: 1.25em; font-weight: bold; outline: none;}

div.search-cloud { margin-top: 0.8em;}

/* Navigation */
div.navigation { font-size:100%; line-height:200%; }
span.navigation-title { padding-right:0.65em; font-weight: bold;}
div.navigation a { text-decoration:underline; padding:0.2em 0.3em;}
span.nav-current-page { padding:0.2em 0.3em; }
div.navigation span.arrow { font-size:100%; font-family:Times, serif; }
div.navigation span.ctrl { font-size:85%; }

dl.block-list { margin: 0; padding:0; font-size: 0.85em;}
dl.block-list dt { margin: 1em 0 0}
dl.block-list dd { margin:0; padding:0;}
div.blog-post-meta-util {width: 40%;}

div.photo-page-main div.photo-controls-buttons {display:none;}
#content-wrapper div.photo-page-section ol li, #content-wrapper div.photo-page-section ul li {margin:0.1em 0;}

div.blog-post-edit-form div.blog-smiles-line {display:none;}
div.blog-post-edit-form div.blog-bbcode-line {margin-right:0;}