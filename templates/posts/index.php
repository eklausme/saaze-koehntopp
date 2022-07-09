<?php
$title = "{$collection['title']} (Page {$pagination['currentPage']})";
require SAAZE_PATH . "/templates/top-layout.php";
?>
	<div class='row justify-content-center text-center my-4 mx-0'>
	<header>
		<div class='col'><h1 class="title mb-lg-4 text-white">Die wunderbare Welt von Isotopp</h1></div>
		<img alt="Rijksmuseum" src="/assets/img/rijksmuseum.jpg">
	</header>
	</div>

<?php
foreach ($pagination['entries'] as $entry) { ?>
<div class="row justify-content-center mb-4 py-4 border-bottom mx-0"><div class="col-lg-8">
	<h1 style="font-weight: 700"><a href="<?= $rbase . $entry['url'] ?>" class="text-decoration-none text-dark"><?= $entry['title'] ?></a></h1>
	<img src="/assets/img/isotopp.jpg" alt="Kris Koehntopp picture" class="me-1 p-0" style="width: 1.9rem; border-radius: 1rem;">
		<a href="https://twitter.com/isotopp" class="text-secondary text-decoration-none">Kristian Köhntopp</a> -
	<?= isset($entry['date']) ? date('jS F Y', strtotime($entry['date'])) : 'No date' ?>
	<div class="mt-3"><?= $entry['excerpt'] ?? '---' ?>></div>
</div></div>
<?php } ?>
<div class="row justify-content-center mb-4 py-4 border-bottom mx-0"><div class="col-lg-8">
	<?php if ($pagination['nextUrl']) { ?>
	<a href="<?= $rbase . '/' . ltrim($pagination['nextUrl'],'/') ?>">&larr; Older</a> &nbsp; &nbsp; &nbsp;
	<?php } ?>
	<?php if ($pagination['prevUrl']) { ?>
	<a href="<?= $rbase . '/' . ltrim($pagination['prevUrl'],'/') ?>">Newer &rarr;</a>
	<?php } ?>
</div></div>

<?php require SAAZE_PATH . "/templates/bottom-layout.php"; ?>
