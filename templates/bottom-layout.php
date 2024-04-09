
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
		<p><br><br><?php
			printf("Generated %s GMT using <a href=\"https://eklausmeier.goip.de/blog/2021/10-31-simplified-saaze\">Simplified Saaze</a>%s%s",
				date('d-M-y H:i'),
				getenv('NON_NGINX') ? '' : ', Web-Server <a href="https://nginx.org">NGINX</a>',
				isset($_SERVER['REQUEST_TIME_FLOAT']) ? sprintf(", rendered in %.2f ms",1000 * (microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'])) : ''
			);
		?><br><br></p>
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
	<script src="https://unpkg.com/prismjs@v1.29.0/components/prism-core.min.js"></script>
	<script src="https://unpkg.com/prismjs@v1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
	<script src="https://unpkg.com/prismjs@v1.29.0/plugins/line-numbers/prism-line-numbers.min.js"></script>
<?php } ?>
<?php } ?>

</body>
</html>
