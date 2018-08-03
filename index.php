<?php
$years = explode(",", $_GET["years"]);
$pages = $_GET["pages"];
date_default_timezone_set("America/New_York");
$json = file_get_contents("tweet.js");
$tweets = json_decode($json, true);
usort($tweets, "time_sort");
//print_r($tweets[89]);
?>
<!doctype html>
<html class="<?= $pages ?>">
 <head>
  <link href="print.css" rel="stylesheet">
  <title>Printable Tweets Ready for Book</title>
 </head>
 <body>
  <img class="Flourish" src="flourish.svg">
  <img class="Flourish" src="flourish.svg">
  <article>
  <h1>Tweets</h1>
  <h1><?= ($years[0] == "2007" ? "2012" : $years[0]) . "–" . end($years) ?></h1>
  <nav>by</nav>
  <h2>@Lucent</h2>
  </article>
<?php
$count = 0;
$last_monthyear = 0;
foreach ($tweets as $index=>$tweet) {
	if ($tweet["id_str"] === "182498183463714817") continue; // taylor hacking
	$date = strtotime($tweet["created_at"]);
	if (!in_array(date("Y", $date), $years)) continue;
	$tweet_monthyear = date("F Y", $date);
	if ($tweet_monthyear !== $last_monthyear) {
		$count++;
		if ($count !== 1) echo "</main></td></tr></tbody></table>\n";
		echo "<table><thead><tr><th><h1>{$tweet_monthyear}</h1></th></tr></thead><tfoot><tr><td></td></tr></tfoot><tbody><tr><td><main>";
		$last_monthyear = $tweet_monthyear;
	}
	echo "
 <section id='count-{$index}'>
  <header>
   <div>
    <img class='Icon' src='icon-lucent.jpg'>
    <aside><h3>Lucent</h3><h4>@Lucent</h4></aside>
   </div>
   <img src='twitter.svg' class='Logo'>
  </header>
  <p>";
	echo format_tweet($tweet["full_text"]);
//	if ($tweet["geo"])
//		print_r($tweet["geo"]);
//		//echo "<span> – ", $tweet["geo"], "</span>";
	echo "</p>
  <footer><img src='convo.svg'><em></em><img src='retweet.svg'><em>", format_int($tweet["retweet_count"]), "</em><img src='like.svg'><em>", format_int($tweet["favorite_count"]), "</em><img src='mail.svg'><em> </em>
  <time>", format_time($tweet["created_at"]), "</time></footer>
 </section>\n";
}
?>
</main></td></tr>
 </tbody>
 </table>
 <footer></footer>
 </body>
 <script>
window.onload = function() {
	document.getElementById("count-0").parentNode.style.columnCount = 1;
};
 </script>
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

function time_sort($a, $b) {
	return strtotime($a["created_at"]) > strtotime($b["created_at"]);
}
