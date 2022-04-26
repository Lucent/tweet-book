<?php
$start = strtotime($_GET["datestart"]);
$end = strtotime($_GET["dateend"]);
$export_folder = $_GET["user"];
$hue = $_GET["hue"];
$retweets = $_GET["retweets"];
$replies = $_GET["replies"];
$compact = $_GET["compact"];
$profile_js = file_get_contents($export_folder . "/data/profile.js");
$profile_json = substr($profile_js, strlen("window.YTD.profile.part0 = "));
$profile_info = json_decode($profile_json, true);
//$profile_filename = basename($profile_info[0]["profile"]["avatarMediaUrl"]);
//$icon_url = glob($export_folder . "/data/profile_media/*" . $profile_filename)[0];
$icon_url = $profile_info[0]["profile"]["avatarMediaUrl"];
$pages = $_GET["pages"];
date_default_timezone_set("America/New_York");

$tweets_js = file_get_contents("{$export_folder}/data/tweet.js");
$tweets_json = substr($tweets_js, strlen("window.YTD.tweet.part0 = "));
$tweets = json_decode($tweets_json, true);
usort($tweets, "time_sort");

$account_js = file_get_contents("{$export_folder}/data/account.js");
$account_json = substr($account_js, strlen("window.YTD.account.part0 = "));
$account = json_decode($account_json, true)[0]["account"];

//print_r($tweets[89]["display_text_range"][1]);
?>
<!doctype html>
<html class="<?= $pages ?> <?= $compact === "on" ? "Compact" : "" ?>" style="--hue:<?= $hue ?>deg">
 <head>
  <link href="print.css" rel="stylesheet">
  <title>Printable Tweets Ready for Book</title>
  <script src="twitter-text/js/pkg/twitter-text-3.1.0.js"></script>
 </head>
 <body>
  <svg viewBox="0 0 400 400" class="template">
   <path id="TwitterLogo" d="M153.62,301.59c94.34,0,145.94-78.16,145.94-145.94,0-2.22,0-4.43-.15-6.63A104.36,104.36,0,0,0,325,122.47a102.38,102.38,0,0,1-29.46,8.07,51.47,51.47,0,0,0,22.55-28.37,102.79,102.79,0,0,1-32.57,12.45,51.34,51.34,0,0,0-87.41,46.78A145.62,145.62,0,0,1,92.4,107.81a51.33,51.33,0,0,0,15.88,68.47A50.91,50.91,0,0,1,85,169.86c0,.21,0,.43,0,.65a51.31,51.31,0,0,0,41.15,50.28,51.21,51.21,0,0,1-23.16.88,51.35,51.35,0,0,0,47.92,35.62,102.92,102.92,0,0,1-63.7,22A104.41,104.41,0,0,1,75,278.55a145.21,145.21,0,0,0,78.62,23"/>
  </svg>
  <svg viewBox="0 0 13 13" class="template">
   <path id="Convo" d="M7.87,0H5.13A5.09,5.09,0,0,0,0,5.14,4.88,4.88,0,0,0,4.91,10v2.52a.56.56,0,0,0,.08.26.51.51,0,0,0,.42.23.5.5,0,0,0,.26-.08C5.85,12.81,9.93,10.2,11,9.3a5.55,5.55,0,0,0,2-4.16h0A5.08,5.08,0,0,0,7.87,0Zm2.49,8.53c-.75.64-3.2,2.25-4.46,3.06V9.5A.49.49,0,0,0,5.41,9H5.15A3.89,3.89,0,0,1,1,5.14,4.1,4.1,0,0,1,5.13,1H7.86A4.1,4.1,0,0,1,12,5.14,4.54,4.54,0,0,1,10.36,8.54Z"/>
  </svg>
  <svg viewBox="0 0 13.16 11.93" class="template">
   <path id="Mail" d="M11.68,0H1.48A1.48,1.48,0,0,0,0,1.48v9a1.48,1.48,0,0,0,1.48,1.48h10.2a1.48,1.48,0,0,0,1.48-1.48v-9A1.48,1.48,0,0,0,11.68,0ZM1.48,1h10.2a.49.49,0,0,1,.5.49v.8L6.88,5.81a.53.53,0,0,1-.59,0L1,2.28v-.8A.49.49,0,0,1,1.48,1Zm10.2,10H1.48A.49.49,0,0,1,1,10.45v-7L5.75,6.61a1.5,1.5,0,0,0,1.66,0l4.77-3.17v7A.49.49,0,0,1,11.68,10.94Z"/>
  </svg>
  <svg viewBox="0 0 17.1 11.45" class="template">
   <g id="Retweet">
    <path d="M17,8a.5.5,0,0,0-.7,0L14.58,9.64V2.47A2.47,2.47,0,0,0,12.12,0H7.74a.5.5,0,0,0-.5.49.5.5,0,0,0,.5.5h4.38A1.48,1.48,0,0,1,13.6,2.47V9.64L11.92,8a.49.49,0,0,0-.7.7l2.52,2.52a.51.51,0,0,0,.7,0L17,8.66A.5.5,0,0,0,17,8Z"/>
	<path d="M9.36,10.47H5A1.49,1.49,0,0,1,3.51,9V1.82L5.18,3.49a.48.48,0,0,0,.7,0,.5.5,0,0,0,0-.7L3.36.28a.48.48,0,0,0-.7,0L.14,2.79a.5.5,0,0,0,0,.7.5.5,0,0,0,.7,0L2.52,1.82V9A2.47,2.47,0,0,0,5,11.45H9.36a.49.49,0,1,0,0-1Z"/>
   </g>
  </svg>
  <svg viewBox="0 0 13.23 12.45" class="template">
   <path id="Like" d="M6.61,12.45h0C4.91,12.42,0,8,0,3.79A3.77,3.77,0,0,1,3.56,0,3.83,3.83,0,0,1,6.61,1.8,3.86,3.86,0,0,1,9.67,0a3.77,3.77,0,0,1,3.56,3.79c0,4.2-4.91,8.63-6.61,8.66ZM3.56,1A2.76,2.76,0,0,0,1,3.79c0,3.78,4.63,7.63,5.62,7.67s5.63-3.89,5.63-7.67A2.76,2.76,0,0,0,9.67,1C8,1,7.08,2.92,7.07,2.94a.51.51,0,0,1-.91,0S5.22,1,3.56,1Z"/>
  </svg>

<?= file_get_contents("image/flourish.svg"); ?>

  <svg class="Flourish" viewBox="0 0 1135.98 1167.16">
   <use href="#Flourish"/>
  </svg>
  <svg class="Flourish" viewBox="0 0 1135.98 1167.16">
   <use href="#Flourish"/>
  </svg>

  <article>
   <h1>Tweets</h1>
   <h1><?= date("Y", $start) . "–" . date("Y", $end) ?></h1>
   <nav>by</nav>
   <h2><?= $account["accountDisplayName"] ?><br>@<?= $account["username"] ?></h2>
  </article>
  <article></article>
<?php
$count = 0;
$total = 0;
$last_monthyear = 0;
foreach ($tweets as $index=>$tweet) {
	$tweet = $tweet["tweet"];
//	print_r($tweet);
//	if (++$total > 631) break;
	if ($retweets !== "on" && preg_match("/^RT @?(\w){1,15}:/", $tweet["full_text"]))
		continue;
	if ($replies !== "on" && array_key_exists("in_reply_to_user_id", $tweet))
		continue;
	if ($tweet["id_str"] === "182498183463714817") continue; // taylor hacking
	$date = strtotime($tweet["created_at"]);
	if ($date < $start || $date > $end)
		continue;
	$tweet_monthyear = date("F Y", $date);
	if ($tweet_monthyear !== $last_monthyear) {
		$count++;
		if ($count !== 1) echo "</main></td></tr></tbody></table>\n";
		$tweet_year = date("Y", $date);
		$idx = 1;//array_search($tweet_year, $years);
		echo "<table><thead><tr><th><h1>{$tweet_monthyear}</h1></th></tr></thead><tfoot><tr><td style='counter-reset: idx {$idx}; counter-reset: year {$tweet_year}'></td></tr></tfoot><tbody><tr><td><main>";
		$last_monthyear = $tweet_monthyear;
	}
	echo "
 <section id='count-{$index}'>
  <header>
   <div>
    <img class='Icon' src='{$icon_url}'>
    <aside><h3>{$account['accountDisplayName']}</h3><h4>@{$account['username']}</h4></aside>
   </div>
   <svg class='Logo' viewBox='0 0 400 400'><use href='#TwitterLogo'/></svg>
  </header>";
//	if (mb_strlen(html_entity_decode($tweet["full_text"])) > 140) {
//		echo "MAXED OUT:";
//		print_r($tweet);
//	}
//	if ($tweet["geo"])
//		print_r($tweet["geo"]);
//		//echo "<span> – ", $tweet["geo"], "</span>";
	$image_urls = []; $image_srcs = [];
	if (array_key_exists("media", $tweet["entities"])) {
		$images = $tweet["entities"]["media"];
		foreach ($images as $image) {
//			print_r($tweet);
			$url = $image["media_url_https"];
			$id = $tweet["id"];
			preg_match('/https\:\/\/pbs\.twimg\.com\/media\/([^\.]*)\.([^\']*)/', $url, $links);
			if ($links)
				$media_url = "{$export_folder}/data/tweet_media/{$id}-{$links[1]}.{$links[2]}";
			else
				$media_url = $url;
			$image_urls[] = $image["url"];
			$image_srcs[] = "<img src='{$media_url}' onerror='this.remove();'>\n";
		}
	}
	$no_urls = str_replace($image_urls, "", $tweet["full_text"]);
  	echo "\n <p>", format_tweet($no_urls), "</p>";
	echo implode("", $image_srcs);
echo "
  <footer>
   <a href='//twitter.com/intent/tweet?in_reply_to={$tweet["id_str"]}'><svg viewBox='0 0 13 13'><use href='#Convo'/></svg><em></em></a>
   <a href='//twitter.com/intent/retweet?tweet_id={$tweet["id_str"]}'><svg viewBox='0 0 17.1 11.45'><use href='#Retweet'/></svg><em>", format_int($tweet["retweet_count"]), "</em></a>
   <a href='//twitter.com/intent/like?tweet_id={$tweet["id_str"]}'><svg viewBox='0 0 13.23 12.45'><use href='#Like'/></svg><em>", format_int($tweet["favorite_count"]), "</em></a>
   <!-- <svg viewBox='0 0 13.16 11.93'><use href='#Mail'/></svg><em> </em> -->
   <time><a href='//twitter.com/{$account["username"]}/status/{$tweet["id_str"]}'>", format_time($tweet["created_at"]), "</a></time>
  </footer>
 </section>\n";
}
?>
</main></td></tr>
 </tbody>
 </table>
 <footer></footer>
<!-- <abbr></abbr> -->
 <script>
"use strict";
function nl2br(str) {
    return str.replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1<br>$2');
}

window.onload = function() {
	// Make my first 2007 tweet bigger
	if (document.getElementById("count-0") && document.getElementById("count-0").parentNode.children.length === 1)
		document.getElementById("count-0").parentNode.style.columnCount = 1;

	const tweets = document.querySelectorAll("section > p");
	console.log(tweets.length);
	for (let tweet of tweets) {
		let text = tweet.textContent;
		tweet.innerHTML = nl2br(twttr.txt.autoLink(text, twttr.txt.configs.version2));
	}
};
 </script>
 </body>
</html>

<?php
function format_tweet($text) {
//	$text = nl2br($text);
/*	$io = [
		0 => ['pipe', 'r'], // node's stdin
		1 => ['pipe', 'w'], // node's stdout
		2 => ['pipe', 'w'], // node's stderr
	];
	$proc = proc_open("node tweet-parse.js", $io, $pipes);
	$node_output = $pipes[1];*/

	return $text;
}

function format_time($date) {
	return date("g:i A - j M Y", strtotime($date));
}

function format_int($number) {
	if ($number != 0)
		return round($number);
	else
		return " ";
}

function time_sort($a, $b) {
	return strtotime($a["tweet"]["created_at"]) > strtotime($b["tweet"]["created_at"]);
}
