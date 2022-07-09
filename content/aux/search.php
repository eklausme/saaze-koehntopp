
	<div class='row justify-content-center text-center my-4 mx-0'>
	<header>
		<div class='col'><h1 class="title mb-lg-4 text-white">Die wunderbare Welt von Isotopp</h1></div>
		<img alt="Rijksmuseum" src="/assets/img/rijksmuseum.jpg">
	</header>
	</div>

	<div class="row justify-content-center mb-4 py-4 border-bottom mx-0"><div class="col-lg-8">
	<form action="search.php" method="post">
		<label for=searchstr>Search for strings in blogs:</label>
		<input type=text id=searchstr name=searchstr value="<?=$_POST["searchstr"]??''?>" autofocus>
		<input type=submit value=submit>
	</form>

	<br><br>

<?php
//	<div style="font-family:monospace">

// Adapted from https://stackoverflow.com/questions/24783862/list-all-the-files-and-folders-in-a-directory-with-php-recursive-function
function getDirContents($dir, $searchstr, &$results) {
	$files = scandir($dir);

	foreach ($files as $key => $value) {
		$path = $dir . DIRECTORY_SEPARATOR . $value;
		if ( !is_dir($path) ) {
			if ( strcmp(substr($value,-5),".html") === 0 || strcmp(substr($value,-4),".php") === 0 ) {
				$t = file_get_contents($path);
				$len = strlen($t);
				$pos = stripos($t,$searchstr);
				if ($pos === false) continue;

				// Get title in HTML file if present
				$titlePos = stripos($t,"<title>");
				if ($titlePos === false) goto noTitle;
				$endTitlePos = stripos($t,"</title>");
				if ($endTitlePos === false) goto noTitle;
				$titlePos += 7;
				if ($endTitlePos <= $titlePos) goto noTitle;
				$title = htmlspecialchars( substr($t,$titlePos,$endTitlePos-$titlePos) );
				goto prepareExcerpt;
				noTitle: $title = $value;

				// Prepare excerpt
				prepareExcerpt:
				if (($low  = $pos - 60) < 0) $low = 0;
				$high = $pos + 60;
				if ($high > $len) $high = $len;
				//$results[] = $path;	// array_push()
				$excerpt = htmlspecialchars( substr($t,$low,$high-$low) );

				if (str_ends_with($path,"/index.html"))
					$path = substr($path,0,strlen($path)-10);
				$results[$path] = array($title,$excerpt);
			}
		} else if ($value != "." && $value != "..") {
			getDirContents($path, $searchstr, $results);
		}
	}

	return $results;
}

$res = array();	// hash: key=URL, value is array of title and excerpt
$s = $_POST["searchstr"] ?? NULL;
if (isset($s) && strlen($s) > 0 && strlen($s) < 240) {
	//printf("Before calling getDirContents, getcwd()=%s\n",getcwd());
	getDirContents(".",$s,$res);
	echo "<table class=\"table table-striped table-bordered\">\n";
	foreach ($res as $key => $value) {
		printf("<tr><td><a href=\"%s\">%s</a><td>%s\n",$key,$value[0] ?? $key,$value[1]);
	}
	echo "</table>\n";
	//echo "<pre>\n"; var_dump( getDirContents("/srv/http/build",$s,$res) ); echo "</pre>\n";
}
?>
	<div class="row justify-content-center mb-4 py-4 border-bottom mx-0"><div class="col-lg-8"></div></div>
	</div></div>


