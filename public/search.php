<?php $title='Search'; $url='/koehntopp/search.php'; $rbase='/koehntopp'; $cdirs='koehntopp'; ?>
<!DOCTYPE html>
<html lang="<?=!isset($pagination) && isset($entry['tags']) && in_array('lang_de',$entry['tags']) ? 'de' : 'en'?>">

<head>
	<meta charset="UTF-8">
	<title><?= $title ?? "Saaze" ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
	$canonicalURL = $url ?? '';
	if (str_contains($canonicalURL,'-'))
		$canonicalURL = substr($canonicalURL,0,5) . '/' . substr($canonicalURL,6,2) . '/' . substr($canonicalURL,9,2) . '/' . substr($canonicalURL,12) . '.html';
	else
		$canonicalURL = '/' . ltrim($canonicalURL,'/');
?>
	<link rel="canonical" href="https://blog.koehntopp.info<?=$canonicalURL?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS" href="https://eklausmeier.goip.de/koehntopp/feed.xml" />
	<meta name="description" content="Kristian Koehntopp | Die wunderbare Welt von Isotopp" />
	<meta name="author" content="Kristian Koehntopp" />
	<meta name="copyright" content="Kristian Koehntopp" />
	<meta name="generator" content="Saaze" />
	<meta property="og:url" content="https://blog.koehntopp.info" />
	<meta property="og:type" content="article" />
	<meta name="twitter:site" content="@isotopp" />
	<meta name="twitter:creator" content="@isotopp" />
	<meta property="twitter:title" content="<?=$title?>">
	<link href="data:image/x-icon;base64,AAABAAEAICAQAAEABADoAgAAFgAAACgAAAAgAAAAQAAAAAEABAAAAAAAAAAAAEcAAABHAAAAEAAAAAAAAAACAgIAEBAQAENDQwBmZmYAiYmJAJ6engCpqakAu7u7AMfHxwDW1tYA2traAN7e3gDl5eUAKCgoAP39/QBZWVkA7u7u7u7u7u7u7u7u7u7u7u7u7u7u7u7Lu7zu7u7u7u7u7u7u7lPQAAAAEknu7u7u7u7u6jEAAAAAAAAAJ+7u7u7u7kAAAA0jM/IQAAD87u7u7sIAATfu7u7u6k0ADc7u7u4gADzu7u7u7u7uUQDc7u7jABfu7u7u7u7u7uvQD+7ukAB+7oM17u5TNI7uwzPO7vAE7u5QA+7kAAACju7u7uwAHu7uUAPusQAAAATu7u7lAE7u7lAD7vACVCAATu7u4wCO7u5QAZgA3O7kAAfu7uIA7u7uUADSAF7u7lAB7u7tDe7u7lAAAALu7u7vAE7u4Q3u7u5QAQAH7u7u6wDe7uEN7u7uUAPwAu7u7u4gCe7tAe7u7lAD4gD+7u7uQAXu7wCe7u5QA+zQD+7u7nAE7uQAXu7uUAPuoQA+7u6ABO7oAC7u7lAD7u7u7u7ucATu7tAJ7u5QA+7u7u7u7kAG7u5AD+7uUAPu7u7u7u4gDO7u4QBu7lAD7u7u7u7oAC7u7uUAGe6lWO7u7u7u7QBu7u7u8AF+7u7u7u7u7iAC7u7u7uIAA87u7u7u7o0AGu7u7u7uIAAfbO7u7GIAAY7u7u7u7uQQAAAd3RAAANnu7u7u7u7uwxAAAAAAANXu7u7u7u7u7u7nQtER0kju7u7u7u7u7u7u7u7u7u7u7u7u7u4AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==" rel="icon" type="image/x-icon"/>


<?php if (isset($entry['prismjs'])) { ?>
	<link href=/jscss/prism.css rel=stylesheet>
<?php } ?>
<?php if (true || isset($entry['prismjs-old'])) { ?>
	<link href="https://unpkg.com/prismjs@v1.28.0/themes/prism.css" rel="stylesheet" />
	<link href="https://unpkg.com/prismjs@v1.28.0/plugins/line-numbers/prism-line-numbers.css" rel="stylesheet" />
<?php } ?>
<link rel="stylesheet" href="/jscss/koehntopp.css">

</head>

<body class="line-numbers vsc-initialized">
<?php $rbase ??= ''; ?>

	<nav class="navbar navbar-expand-lg navbar-light px-lg-4 pt-lg-4">
	<div class="container-fluid">
	<a class="navbar-brand justify-content-center" href="<?=$rbase?>/" rel="home" title="Die wunderbare Welt von Isotopp">
		<img alt="Kris" height="48" width="48" src="/assets/img/isotopp.jpg" class="p-0 me-3 d-block d-lg-inline">
		<span class="h4 d-block d-lg-inline">Die wunderbare Welt von Isotopp</span></a>

		<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto">
			<li class="nav-item "><a class="nav-link" href="<?=$rbase?>/about/"><span class="">About</span></a></li>
			<li class="nav-item "><a class="nav-link" href="<?=$rbase?>/contribute/"><span class="">Contribute</span></a></li>
			<li class="nav-item "><a class="nav-link" href="<?=$rbase?>/search.php"><span class=""><svg class="bi" height="1.5rem" width="1.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#search"></use></svg></span></a></li>
			<li class="nav-item "><a class="nav-link" href="<?=$rbase?>/tags/"><span class=""><svg class="bi" width="1.5rem" height="1.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#tags-fill"></use></svg></span></a></li>
			</ul>
		</div>

    </div>
	</nav>

	<main class="container-fluid p-0">



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



	</main>

	<footer class="row justify-content-center mb-4 pb-4 mx-0">
		<div class="col-8 text-center">
			<div>A collection of old stuff, new stuff and random stuff.</div>
			<div class="row text-primary mt-4">
			<div class="col">

			<a href="<?=$rbase?>/feed.xml" title="Follow RSS feed" class="me-3 text-decoration-none">
			<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#rss-fill"></use></svg>
			</a>

			<a href="mailto:kristian.koehntopp@gmail.com" title="Email" class="me-3 text-decoration-none">
			<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#envelope"></use></svg>
			</a>

			<a href="https://github.com/isotopp" title="Follow on GitHub" class="me-3 text-decoration-none">
				<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#github"></use></svg>
			</a>

			<a href="https://www.reddit.com/user/isotopp" title="Follow on Reddit" class="me-3 text-decoration-none">
			<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#reddit"></use></svg>
			</a>

			<a href="http://steamcommunity.com/id/ixotopp" title="Follow on Steam" class="me-3 text-decoration-none">
			<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#steam"></use></svg>
			</a>

			<a href="https://twitter.com/isotopp" title="Follow on Twitter" class="me-3 text-decoration-none">
			<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#twitter"></use></svg>
			</a>

			<a href="https://www.youtube.com/user/isotopp" title="Follow on YouTube">
			<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#youtube"></use></svg>
			</a>

			</div>
			</div>
		</div>
		<p><br><br>Generated <?= date('d-M-y H:i') ?> GMT using <a href="https://eklausmeier.goip.de/blog/2021/10-31-simplified-saaze">Simplified Saaze</a>, served by <a href="https://hiawatha-webserver.org">Hiawatha</a><br><br></p>
	</footer>

	<script src="https://blog.koehntopp.info/js/bootstrap.js"></script>
	<script src="https://blog.koehntopp.info/js/lunr.js"></script>
	<script src="https://blog.koehntopp.info/js/app.js"></script>

<?php if (!isset($pagination)) { ?>
<?php if (isset($entry['MathJax'])) { ?>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<?php } ?>
<?php if (isset($entry['Twitter'])) { ?>
	<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<?php } ?>
<?php if (isset($entry['Mermaid'])) { ?>
	<script src="https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js"></script>
	<script>mermaid.initialize({startOnLoad:true});</script>
<?php } ?>
<?php if (isset($entry['prismjs'])) { ?>
	<script src="/jscss/prism.js"></script>
<?php } ?>
<?php if (true || isset($entry['prismjs-old'])) { ?>
	<script src="https://unpkg.com/prismjs@v1.28.0/components/prism-core.min.js"></script>
	<script src="https://unpkg.com/prismjs@v1.28.0/plugins/autoloader/prism-autoloader.min.js"></script>
	<script src="https://unpkg.com/prismjs@v1.28.0/plugins/line-numbers/prism-line-numbers.min.js"></script>
<?php } ?>
<?php } ?>

</body>
</html>
