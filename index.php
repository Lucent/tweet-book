<?php
date_default_timezone_set("America/New_York");
$json = file_get_contents("tweet.js");
$tweets = json_decode($json, true);
$tweets = array_reverse($tweets);
// print_r($tweets[5]);
?>
<!doctype html>
<html>
 <head>
<style>
@page	{ size: 7in 7in; }
body	{ background-color: #f5f8fa; color: black; font-family: "Helvetica Neue"; font-weight: bold; margin: 0; -webkit-print-color-adjust: exact; color-adjust: exact; }
section	{ border: none; border-radius: 0.5em; padding: 1.5em; margin: 2em; background-color: white; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); page-break-inside: avoid; -webkit-box-decoration-break: clone; box-decoration-break: clone; }
h1, h2	{ margin: 0; font-size: 1.2em; }
h2		{ font-size: 1em; }
h2, p > span	{ color: rgb(101, 119, 134); }
h2, time		{ font-family: "Helvetica Neue"; font-weight: normal; }
.Icon	{ object-fit: cover; border-radius: 50%; height: 3em; margin-right: 0.2em; }
.Logo	{ float: right; }
.Icon, .Logo	{ height: 3em; }
p		{ font-size: 2em; letter-spacing: -0.04em; }
p ~ img	{ height: 1em; vertical-align: sub; }
img + img, em + img	{ margin-left: 4em; }
em		{ font-style: normal; margin-left: 0.5em; }
time	{ float: right; }
</style>
 </head>
 <body>

<?php
$limiter = 0;
foreach ($tweets as $tweet) {
$limiter++;
if ($limiter > 20) exit;
echo "
 <section>
  <img src='twitter.svg' class='Logo'>
  <table>
   <tr>
    <td><img class='Icon' src='icon-lucent.jpg'></td>
    <td><h1>Lucent</h1><h2>@Lucent</h2></td>
   </tr>
  </table>
  <p>";
echo format_tweet($tweet["full_text"]);
if ($tweet["geo"])
	echo "<span> – ", $tweet["geo"], "</span>";
echo "</p>
  <img src='convo.svg'><em> </em><img src='retweet.svg'><em>", format_int($tweet["retweet_count"]), "</em><img src='like.svg'><em>", format_int($tweet["favorite_count"]), "</em><img src='mail.svg'><em> </em>
  <time>", format_time($tweet["created_at"]), "</time>
 </section>\n";
}
?>
 </body>
</html>

<?php
function format_tweet($text) {
	return nl2br($text);
}

function format_time($date) {
	return date("g:i A - j M Y", strtotime($date));
}

function format_int($number) {
	if ($number !== "0.0")
		return round($number);
	else
		return " ";
}
