<?php
$years = explode(",", $_GET["years"]);
date_default_timezone_set("America/New_York");
$json = file_get_contents("tweet.js");
$tweets = json_decode($json, true);
$tweets = array_reverse($tweets);
//print_r($tweets[31]);
?>
<!doctype html>
<html>
 <head>
  <link href="print.css" rel="stylesheet">
  <title>Printable Tweets Ready for Book</title>
 </head>
 <body>
<?php
$limiter = 0;
$last_monthyear = 0;
foreach ($tweets as $tweet) {
//	if ($limiter++ > 20) exit;
	if ($tweet["id_str"] === "182498183463714817") continue; // taylor hacking
	$date = strtotime($tweet["created_at"]);
	if (!in_array(date("Y", $date), $years)) continue;
	$tweet_monthyear = date("F Y", $date);
	if ($tweet_monthyear !== $last_monthyear) {
		echo "</main><h1>{$tweet_monthyear}</h1>\n<main>";
		$last_monthyear = $tweet_monthyear;
	}
	echo "
 <section>
  <header>
   <table>
    <tr>
     <td><img class='Icon' src='icon-lucent.jpg'></td>
     <td><h3>Lucent</h3><h4>@Lucent</h4></td>
    </tr>
   </table>
   <img src='twitter.svg' class='Logo'>
  </header>
  <p>";
	echo format_tweet($tweet["full_text"]);
if ($tweet["geo"])
	echo "<span> – ", $tweet["geo"], "</span>";
	echo "</p>
  <footer><img src='convo.svg'><em></em><img src='retweet.svg'><em>", format_int($tweet["retweet_count"]), "</em><img src='like.svg'><em>", format_int($tweet["favorite_count"]), "</em><img src='mail.svg'><em> </em>
  <time>", format_time($tweet["created_at"]), "</time></footer>
 </section>\n";
}
?>
 </main>
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
