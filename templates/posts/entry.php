<?php require SAAZE_PATH . "/templates/top-layout.php"; ?>

	<div class="page">
	<article><div class="row  justify-content-center text-center my-4 mx-0">
	<header>
		<div class="col">
			<h1 class="title mb-lg-4 text-white"><?= $entry['title'] ?></h1>
			<div class="text-uppercase text-light" style="letter-spacing: 0.1rem;">
				<img alt="isotopp image" src="/assets/img/isotopp.jpg" class="me-1 p-0" style="width: 1.9rem; border-radius: 1rem;">
				<a href="https://twitter.com/isotopp" class="text-light text-decoration-none">Kristian Köhntopp</a>
				<span class="d-none d-lg-inline">-</span>
				<div class="d-block d-lg-inline"><?= isset($entry['date']) ? date('jS F Y',strtotime($entry['date'])) : 'No date' ?></div>
			</div>
		</div>
		<img alt="a featured image" src="/assets/img/<?=$entry['feature-img']??'rijksmuseum.jpg'?>">
	</header>
	</div>

<div class="row justify-content-center mx-0 mt-5 mb-5"><div class="col-lg-8">
<blockquote class="blockquote text-left bg-warning">
<p><b>Original post is here <a href="https://blog.koehntopp.info<?=$canonicalURL?>">https://blog.koehntopp.info<?=$canonicalURL?></a></b></p>
</blockquote>
<?= $entry['content'] ?>
</div></div>

	<br><br><p>
<?php
	$urlencode_entry_url = $entry['url'] ?? '';
	$urlencode_entry_url = (substr($urlencode_entry_url,0,1) === '/' ? '' : '/') . urlencode($urlencode_entry_url);
	$urlencode_title = urlencode($title ?? 'No title');
?>
	<div class="row justify-content-center mb-3 mx-0">
		<div class="col-lg-8 text-center">
			<span class="letter-spacing-01 text-uppercase text-secondary me-2">Share</span>
			<a href="https://www.facebook.com/sharer/sharer.php?u=https%3a%2f%2fblog.koehntopp.info<?=$urlencode_entry_url?>" target="_blank" class="text-decoration-none">
				<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#facebook"></use></svg>
			</a>
			<a href="https://twitter.com/intent/tweet?source=https%3a%2f%2fblog.koehntopp.info<?=$urlencode_entry_url?>&amp;text=<?=$urlencode_title?>%20%7C%20Die+wunderbare+Welt+von+Isotopp:%20https%3a%2f%2fblog.koehntopp.info<?=$urlencode_entry_url?>" target="_blank" class="text-decoration-none">
				<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#twitter"></use></svg>
			</a>
			<a href="http://www.reddit.com/submit?url=https%3a%2f%2fblog.koehntopp.info<?=$urlencode_entry_url?>&amp;title=<?=$urlencode_title?>" target="_blank" class="text-decoration-none">
				<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#reddit"></use></svg>
			</a>
			<a href="mailto:?subject=<?=$urlencode_title?>&amp;body=https%3a%2f%2fblog.koehntopp.info<?=$urlencode_entry_url?>" target="_blank" class="text-decoration-none">
				<svg class="bi" height="2.5rem" width="2.5rem" fill="currentColor"><use xlink:href="/assets/img/bootstrap-icons.svg#envelope-fill"></use></svg>
			</a>
		</div>
	</div>

<?php if (isset($entry['categories'])) { ?>
	<br><strong><a href=<?= $rbase ?>/aux/categories>Categories</a>: </strong><?php
		echo implode( ", ",array_map(fn($x):string =>
			"<a href=$rbase/aux/categories/#".str_replace(' ','%20',$x).">$x</a>",
			(array)($entry['categories'])) )."\n" ?>
<?php } ?>
<?php if (isset($entry['tags'])) { ?>
	<div class="row justify-content-center py-3 mb-3 mx-0">
		<div class="col-lg-8 text-center">
		<span class="letter-spacing-01 text-uppercase text-secondary me-2">Tags</span>
<?php
		foreach( (array)($entry['tags']) as $x ) echo "\t\t"
			. "<a href=\"{$rbase}/tags/#" . str_replace(' ','%20',$x) . "\" class=\"btn btn-sm btn-outline-primary mb-1\">"
			. "<svg class=\"bi\" width=\"1rem\" height=\"1rem\" fill=\"currentColor\">"
			. "<use xlink:href=\"/assets/img/bootstrap-icons.svg#tag-fill\"></use>"
			. "</svg>$x</a>\n";
?>
		</div>
	</div>
<?php } ?>
	</article>
	</div><!-- end of class="page"-->

<?php require SAAZE_PATH . "/templates/bottom-layout.php"; ?>
