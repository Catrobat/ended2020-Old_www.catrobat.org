<?php
$page = "home";
$sub = "";
if (isset($_GET["page"])) {
  $page = $_GET["page"];
}
if (isset($_GET["sub"])) {
  $sub = $_GET["sub"];
}
?>
<!DOCTYPE html>
<html>
<head>
<base href="<?=substr($_SERVER["PHP_SELF"], 0, strrpos($_SERVER["PHP_SELF"], "/") + 1)?>">
<meta charset="utf-8">
<title>Catrobat</title>
<!-- Style sheet for desktop view -->
<link rel="stylesheet" type="text/css" href="css/main.css" />
<!-- Style sheet override for small screens -->
<link rel="stylesheet" type="text/css" href="css/mobile.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/favicon.ico" /> 
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-42270417-8', 'auto');
ga('send', 'pageview');

function setupScripts() {
  // Extern links
  var elements = document.getElementsByTagName("a");
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].getAttribute("target") == "_blank") {
      addLinkEvent(elements[i]);
    }
  }
  
  // User ratings
  var rdiv = document.getElementById("user-ratings");
  if (rdiv) {
    ratings_container = rdiv.children[0];
    ratings_container.pos = 0;
    ratings_container.len = ratings_container.children[1].children.length;
    ratings_container.t = -1;
    ratings_container.children[ratings_container.children.length - 1].innerHTML = "";
    var maxh = 0;
    for (var i = 0; i < ratings_container.len; i++) {
      ratings_container.children[ratings_container.children.length - 1].innerHTML += "<a href=\"javascript:viewRating(" + i + ")\">&bull;</a>"
      if (ratings_container.children[1].children[i].clientHeight > maxh) {
        maxh = ratings_container.children[1].children[i].clientHeight;
      }
      ratings_container.children[1].children[i].style.display = "none";
    }
    ratings_container.style.height = maxh + rdiv.offsetHeight + "px";
    scrollRatings();
  }
  
  // View more divs
  var elements = document.getElementsByClassName("expandable");
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].clientHeight > 320) {
      elements[i].style.maxHeight = "320px";
      var div = document.createElement("DIV");
      var a = document.createElement("A");
      var viewmore = "&nbsp;<br/><span>&nbsp;&nbsp;&nbsp;&nbsp;</span> Show more <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>";
      var viewless = "<span>&nbsp;&nbsp;&nbsp;&nbsp;</span> Show less <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>";
      a.innerHTML = viewmore;
      a.href = "#";
      a.addEventListener("click", function (event) {
        var d = this.parentNode.parentNode;
        if (d.style.maxHeight == "320px") {
          this.innerHTML = viewless;
          d.style.maxHeight = "100000px";
          this.parentNode.className = "less";
        } else {
          this.innerHTML = viewmore;
          d.style.maxHeight = "320px"
          this.parentNode.className = "more";
        }
        event.preventDefault();
      });
      div.className = "more";
      div.appendChild(a);
      elements[i].appendChild(div);
    }
  }
}


function addLinkEvent(obj) {
  obj.addEventListener("click", function(event) {
    event.preventDefault();
    // get url and reconstruct it for ga
    var url = obj.href;
    var server = url.match(/((http[s]?|ftp):\/\/)?(www.)?([^\/]+)/i)[4];
    if (obj.className.indexOf("analytics") != -1) {
      if (url.indexOf("?") != -1) {
        // ? already present
        url += "&";
      } else {
        url += "?"
      }
      url += "utm_source=catrobat.org&utm_medium=Homepage&utm_campaign=catrobat.org%20-%20" + server;
    }
    // send event to ga
    ga('send', 'event', 'out-link', 'click', server);
    window.open(url, "_blank");
  });
}

function scrollRatings() {
  var ratings = ratings_container.children[1];
  var buttons = ratings_container.children[ratings_container.children.length - 1];
  for (var i = 0; i < ratings_container.len; i++) {
    ratings.children[i].style.display = (i == ratings_container.pos) ? "block" : "none";
    buttons.children[i].className = (i == ratings_container.pos) ? "active" : "";
  }
  ratings_container.t = window.setTimeout(scrollRatings, 4000);
  ratings_container.pos = (ratings_container.pos + 1) % ratings_container.len;
}

function viewRating(index) {
  var ratings = ratings_container.children[1];
  var buttons = ratings_container.children[ratings_container.children.length - 1];
  window.clearTimeout(ratings_container.t);
  for (var i = 0; i < ratings_container.len; i++) {
    ratings.children[i].style.display = (i == index) ? "block" : "none";
    buttons.children[i].className = (i == index) ? "active" : "";
  }
}
</script>
</head>

<body class="<?=(($page == "apps" || $page == "press" || $page == "contribute") ? "sub-nav-margin" : "nav-margin")?>" onload="javascript:setupScripts()">

<ul id="navigation">
  <li id="menu"><a>&equiv;</a></li>
  <li id="logo"><a href="home"><img src="img/logo.png" alt="Logo" /></a></li>
  <li<?=($page == "home" ? " class=\"active\"" : "")?>><a href="?page=home">HOME</a></li>
  <li<?=($page == "apps" ? " class=\"active\"" : "")?>><a href="?page=apps">APPS</a>
    <ul>
      <li<?=($sub == "code" ? " class=\"active\"" : "")?>><a href="?page=apps&sub=code">POCKET CODE</a></li>
      <li<?=($sub == "paint" ? " class=\"active\"" : "")?>><a href="?page=apps&sub=paint">POCKET PAINT</a></li>
      <!--<li<?=($sub == "mindstorms" ? " class=\"active\"" : "")?>><a href="apps/mindstorms">MINDSTORMS</a></li>
      <li<?=($sub == "phiro" ? " class=\"active\"" : "")?>><a href="apps/phiro">PHIRO</a></li>
      <li<?=($sub == "drone" ? " class=\"active\"" : "")?>><a href="apps/drone">DRONE</a></li>
      <li<?=($sub == "arduino" ? " class=\"active\"" : "")?>><a href="apps/arduino">ARDUINO</a></li>-->
    </ul>
  </li>
  <li<?=($page == "news" ? " class=\"active\"" : "")?>><a href="?page=news">NEWS</a></li>
  <li<?=($page == "research" ? " class=\"active\"" : "")?>><a href="?page=research">RESEARCH</a></li>
  <!--<li<?=($page == "press" ? " class=\"active\"" : "")?>><a href="press">PRESS</a>
    <ul>
      <li<?=($sub == "releases" ? " class=\"active\"" : "")?>><a href="press/releases">PRESS RELEASES</a></li>
      <li<?=($sub == "prices" ? " class=\"active\"" : "")?>><a href="press/prices">AWARDS</a></li>
      <li<?=($sub == "resources" ? " class=\"active\"" : "")?>><a href="press/resources">RESOURCES</a></li>
    </ul>
  </li>-->
  <li<?=($page == "contribute" ? " class=\"active\"" : "")?>><a href="?page=contribute">CONTRIBUTE</a>
    <ul>
      <li<?=($sub == "partners" ? " class=\"active\"" : "")?>><a href="?page=contribute&sub=partners">PARTNERS</a></li>
      <!--<li<?=($sub == "faq" ? " class=\"active\"" : "")?>><a href="contribute/faq">FAQ</a></li>-->
      <li<?=($sub == "credits" ? " class=\"active\"" : "")?>><a href="?page=contribute&sub=credits">CREDITS</a></li>
    </ul>
  </li>
  <li><a href="https://edu.catrob.at/" target="_blank" class="analytics">EDU</a></li>
</ul>

<div id="content-background">
<?php
// Include content depending on $page
// check if $page is valid
$valid_pages = array("home" => array(),
                     "apps" => array("code", "paint"),
                     "news" => array(),
                     "research" => array(),
                     "contribute" => array("partners", "credits"),
                     "imprint" => array(),
                     "license" => array("additional", "agpl_v3", "ccbysa_v4", "user"),
                     "policies" => array(),
                     "terms" => array(),
                     "404" => array());
       
if (array_key_exists($page, $valid_pages) && ($sub == "" || in_array($sub, $valid_pages[$page]))) {
  if ($sub != "") {
    include($page . "_" . $sub . ".php");
  } else {
    include($page . ".php"); 
  }
} else {
  include("404.php");
}
?>
</div>

<?php
// Include footer
include("footer.php");
?>
  
</body>
</html>
