/**Top menu**/
#horizontal-multilevel-menu,#horizontal-multilevel-menu ul
{
	margin:0; padding:0;
	background:#BC262C url(images/header_menu_bg.gif) repeat-x;
	min-height:27px;
	width:100%;
	list-style:none;
	font-size:11px;
	float:left;
	/*font-size:90%*/
}

#horizontal-multilevel-menu
{
	
}

/*Links*/
#horizontal-multilevel-menu a
{
	display:block;
	padding:5px 10px;
	/*padding:0.3em 0.8em;*/
	text-decoration:none;
	text-align:center;
}

#horizontal-multilevel-menu li 
{
	float:left;
}

/*Root items*/
#horizontal-multilevel-menu li a.root-item
{
	color:#fff;
	font-weight:bold;
	padding:7px 12px;
}

/*Root menu selected*/
#horizontal-multilevel-menu li a.root-item-selected
{
	background:#fc8d3d;
	color:#fff;
	font-weight:bold;
	padding:7px 12px;
}

/*Root items: hover*/
#horizontal-multilevel-menu li:hover a.root-item, #horizontal-multilevel-menu li.jshover a.root-item
{
	background:#e26336;
	color:#fff;
}

/*Item-parents*/
#horizontal-multilevel-menu a.parent
{
	background: url(images/arrow.gif) center right no-repeat;
}

/*Denied items*/
#horizontal-multilevel-menu a.denied
{
	background: url(images/lock.gif) center right no-repeat;
}

/*Child-items: hover*/
#horizontal-multilevel-menu li:hover, #horizontal-multilevel-menu li.jshover
{
	background:#D6D6D6;
	color:#fff;
}

/*Child-items selected*/
#horizontal-multilevel-menu li.item-selected
{
	background:#D6D6D6;
	color:#fff;
}

/*Sub-menu box*/
#horizontal-multilevel-menu li ul
{
	position:absolute;
	/*top:-999em;*/
	top:auto;
	display:none;
	z-index:500;

	height:auto;
	/*width:12em;*/
	width:135px;
	background:#F5F5F5;
	border:1px solid #C1C1C1;
}

/*Sub-menu item box*/
#horizontal-multilevel-menu li li 
{
	width:100%;
	border-bottom:1px solid #DEDEDE;
}

/*Item link*/
#horizontal-multilevel-menu li ul a
{
	text-align:left;
}

/*Items text color & size */
#horizontal-multilevel-menu li a,
#horizontal-multilevel-menu li:hover li a,
#horizontal-multilevel-menu li.jshover li a,
#horizontal-multilevel-menu li:hover li:hover li a,
#horizontal-multilevel-menu li.jshover li.jshover li a,
#horizontal-multilevel-menu li:hover li:hover li:hover li a,
#horizontal-multilevel-menu li.jshover li.jshover li.jshover li a,
#horizontal-multilevel-menu li:hover li:hover li:hover li:hover li a,
#horizontal-multilevel-menu li.jshover li.jshover li.jshover li.jshover li a,
#horizontal-multilevel-menu li:hover li:hover li:hover li:hover li:hover li a,
#horizontal-multilevel-menu li.jshover li.jshover li.jshover li.jshover li.jshover li a
{
	color:#4F4F4F;
	font-weight:bold;
}

/*Items text color & size: hover*/
#horizontal-multilevel-menu li:hover li:hover a,
#horizontal-multilevel-menu li.jshover li.jshover a,
#horizontal-multilevel-menu li:hover li:hover li:hover a,
#horizontal-multilevel-menu li.jshover li.jshover li.jshover a,
#horizontal-multilevel-menu li:hover li:hover li:hover li:hover a,
#horizontal-multilevel-menu li.jshover li.jshover li.jshover li.jshover a
#horizontal-multilevel-menu li:hover li:hover li:hover li:hover li:hover a,
#horizontal-multilevel-menu li.jshover li.jshover li.jshover li.jshover li.jshover a
#horizontal-multilevel-menu li:hover li:hover li:hover li:hover li:hover li:hover a,
#horizontal-multilevel-menu li.jshover li.jshover li.jshover li.jshover li.jshover li.jshover a
{
	color:#4F4F4F;
}

#horizontal-multilevel-menu li ul ul
{
	margin:-27px 0 0 132px;
	/*margin:-1.93em 0 0 11.6em;*/
}

#horizontal-multilevel-menu li:hover ul ul,
#horizontal-multilevel-menu li.jshover ul ul,
#horizontal-multilevel-menu li:hover ul ul ul,
#horizontal-multilevel-menu li.jshover ul ul ul,
#horizontal-multilevel-menu li:hover ul ul ul ul,
#horizontal-multilevel-menu li.jshover ul ul ul ul,
#horizontal-multilevel-menu li:hover ul ul ul ul ul,
#horizontal-multilevel-menu li.jshover ul ul ul ul ul
{
	/*top:-999em;*/
	display:none;
}

#horizontal-multilevel-menu li:hover ul,
#horizontal-multilevel-menu li.jshover ul,
#horizontal-multilevel-menu li li:hover ul,
#horizontal-multilevel-menu li li.jshover ul,
#horizontal-multilevel-menu li li li:hover ul,
#horizontal-multilevel-menu li li li.jshover ul,
#horizontal-multilevel-menu li li li li:hover ul,
#horizontal-multilevel-menu li li li li.jshover ul,
#horizontal-multilevel-menu li li li li li:hover ul,
#horizontal-multilevel-menu li li li li li.jshover ul
{
	/*z-index:1000;
	top:auto;*/
	display:block;
}

div.menu-clear-left
{
	clear:left;
}