<?php

/*
    menu item with subs
    $links['menugroup']['topitemname'] = "url";
    $links['menugroup']['subitemname'] = "url";
    $links['menugroup']['subitemname'] = "url";
*/

function psc_navigation_menu()
{

    /*if ($GLOBALS['psc_user']['user_id']==7489) {
      print_r($GLOBALS['psc_user']);
    }*/
    $links['home'] = 'http://photoshopcontest.com/';
    $links['contests']['contests'] = '/contests/active.html';
    //$links['contests']['active contests'] = "/contests/active.html";
    //$links['contests']['contest archives'] = "/archives/photoshop-contests.html";
    //$links['contests']['special events'] = "/events/special.html";
    $links['contests']['H2H 2015'] = '/tournament/16';
    $links['H2H']['H2H'] = '/tournament/16';
    $links['H2H']['H2H 2015'] = '/tournament/16';

    //$links['contests']['Reunion 2012'] = "/page/reunion-2012";

    //$links['contests']['H2H Spring 2011'] = "/tournament/9/index.html";
    $links['prizes'] = '/prizes/index.html';
    $links['galleries'] = '/galleries/index.html';
    $links['stats'] = '/standings/leaders.html';
    $links['forum'] = '/boards/';
    $links['chat'] = '/chat/talk.html';
    $links['tutorials']['tutorials'] = '/tutorials/photoshop-tips.html';
    $links['tutorials']['videos'] = '/tutorials_video/photoshop-tips.html';
    $links['news'] = '/news/index.html';
    $links['help'] = '/faq/help.html';
    //$links['Store'] = "#";
    $links['advantage'] = '/advantage/index.html';
    if ($GLOBALS['psc_user']['mod'] || $GLOBALS['psc_user']['user_id'] == 7489) {
        $links['mods']['mods'] = 'http://photoshopcontest.com/mods.php';
        $links['mods']['admin'] = 'http://photoshopcontest.com/admin/';
    }
    //$links['advantage']['chat'] = "/advantage-chat/talk.html";
    return $links;
}

/* building functions */
function psc_build_nav()
{
    $links = psc_navigation_menu();

    foreach ($links as $title => $url) {
        $data .= _psc_build_nav_link($title, $url);
    }

    $html = "<div class=\"topnav\">
			 
			 <ul id=\"navlist\">
			 {$data}</ul>
			 
			 </div><div style=\"clear:both\" />
			 ";
    $html .= '<script>sfHover = function() {
			var sfEls = document.getElementById("navlist").getElementsByTagName("li");
			for (var i=0; i<sfEls.length; i++) {
				sfEls[i].onmouseover=function() {
					this.className+=" sfhover";
				}
				sfEls[i].onmouseout=function() {
				this.className=this.className.replace(new RegExp(" sfhover"), "");
				}
			}
		}
		if (window.attachEvent) window.attachEvent("onload", sfHover);</script>';

    return $html;
}

function _psc_build_nav_link($title, $url)
{
    global $dbconn;
    $userid = ($GLOBALS['userdata']['user_id'] ? $GLOBALS['userdata']['user_id'] : $GLOBALS['psc_user']['user_id']);

    if (! is_array($url)) {
        //news light up
        if ($title == 'news' && $userid > 1) {
            //$title.='.';

            $sql = "select lastnews from users where id='{$userid}'";
            $lastnewsquery = mysqli_query($dbconn, $sql);
            $lastnews = mysqli_fetch_assoc($lastnewsquery);
            $lastnewstime = $lastnews['lastnews'];

            $sql = "select * FROM news_news
        where published=1 and rejected=0
        and updated_date > '{$lastnewstime}'";

            $result = mysqli_query($dbconn, $sql);
            $countnews = mysqli_num_rows($result);
            if ($countnews > 0) {
                $title = ucfirst($title).'<span style="color:red">('.$countnews.')</span>';
            }

        }
        //
        $baseurl = explode('/', $url);
        if (strstr($_SERVER['REQUEST_URI'], "/{$baseurl[1]}/")) {
            $current = ' id="current"';
        } else {
            $current = null;
        }
        $data = "<li{$current}><a href=\"{$url}\">".ucfirst($title)."</a></li>\n";

        return $data;
    } else {
        //parse first array

        $t = array_shift(array_keys($url));
        $u = array_shift($url);

        $baseurl = explode('/', $u);
        if (strstr($_SERVER['REQUEST_URI'], "/{$baseurl[1]}/")) {
            $current = ' id="current"';
        } else {
            $current = null;
        }
        $data .= "<li{$current}><a href=\"{$u}\">".ucfirst($t)."</a><ul class=\"subs\">\n";

        foreach ($url as $t => $l) {
            $data .= _psc_build_nav_link($t, $l);
            $p++;
        }
        $data .= "</ul></li>\n";

        return $data;
    }
}
