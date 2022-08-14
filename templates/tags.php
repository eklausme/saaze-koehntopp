<?php require SAAZE_PATH . "/templates/top-layout.php"; ?>

<section>
	<div class='row mx-0 justify-content-center text-center'>
		<div class='col-lg-8'><h1 id=tags><?= $entry['title'] ?></h1></div>
	</div>
</section>

<section class='mb-4'>
	<div class='row mx-0 justify-content-center'><div class='col-lg-8'>
<?php
	//  \prtCatOrTag($GLOBALS['cat_and_tag']['tags'],0);
	$cat_and_tag_json = @file_get_contents(SAAZE_PATH . "/content/cat_and_tag.json");
	if ($cat_and_tag_json === false)
		$cat_and_tag = array('tags' => array());	//exit(81);
	if (($cat_and_tag = json_decode($cat_and_tag_json,true)) === null) {
		printf("Error in 'cat_and_tag.json file, json_last_error_msg() = |%s|\n", json_last_error_msg());
		$cat_and_tag = array('tags' => array());	//exit(82);
	}

	$hash = $cat_and_tag['tags'];
	ksort($hash);
	$hash_s = array_keys($hash);	// keys of categories/tags in sorted order

	echo "<p>\n";
	foreach ($hash_s as $h) {
		printf("\t<a class=\"btn btn-sm btn-outline-primary mb-1\" href=\"#%s\">\n"
		."\t\t<svg class=\"bi\" width=\"1rem\" height=\"1rem\" fill=\"currentColor\"><use xlink:href=\"/assets/img/bootstrap-icons.svg#tag-fill\"></use></svg>%s</a>\n",
			str_replace(' ','-',$h),$h);
	}
	echo "</p>\n";
	foreach ($hash as $tagEl => $tagarr) {
		$tagElMod = str_replace(' ','-',$tagEl);
		printf("\n<a href=\"#tags\" style=\"float:right\">⌃</a><h3 id=\"%s\"><a class=\"text-primary\" href=\"#%s\">\n"
			."\t<svg class=\"bi\" width=\"1.5rem\" height=\"1.5rem\" fill=\"currentColor\"><use xlink:href=\"/assets/img/bootstrap-icons.svg#tag-fill\"></use></svg>"
			."%s</a></h3>\n<ol>\n",$tagElMod,$tagElMod,$tagEl);
		foreach ($tagarr as $tagRef)
			printf("\t<li class=\"d-block\"><a href=\"%s\">%s: %s</a></li>\n",'..'.$tagRef[0],substr($tagRef[1],0,10),$tagRef[2]);
		echo "</ol>\n";
	}
?>
	</div></div>
</section>

	<br><br><p>

<?php require SAAZE_PATH . "/templates/bottom-layout.php"; ?>
