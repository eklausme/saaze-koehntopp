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
	<link href="https://unpkg.com/prismjs@latest/themes/prism.css" rel="stylesheet" />
	<link href="https://unpkg.com/prismjs@latest/plugins/line-numbers/prism-line-numbers.css" rel="stylesheet" />
<?php } ?>
<link rel="stylesheet" href="/jscss/koehntopp.css">


<link href="/koehntopp/pagefind/pagefind-ui.css" rel="stylesheet">
<script src="/koehntopp/pagefind/pagefind-ui.js"></script>
<script>
	window.addEventListener('DOMContentLoaded', (event) => {
		new PagefindUI({ element: "#search", showSubResults: true });
	});
</script>

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
			<li class="nav-item "><div id="search"></div></li>
<?php if (false) { ?>
			<li class="nav-item "><a class="nav-link" href="<?=$rbase?>/search.php"><span class=""><svg class="bi" height="1.5rem" width="1.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#search"></use></svg></span></a></li>
<?php } ?>
			<li class="nav-item "><a class="nav-link" href="<?=$rbase?>/tags/"><span class=""><svg class="bi" width="1.5rem" height="1.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#tags-fill"></use></svg></span></a></li>
			</ul>
		</div>

    </div>
	</nav>

	<main class="container-fluid p-0">


