<p>
<a href="https://packagist.org/packages/eklausme/saaze-koehntopp"><img src="https://img.shields.io/packagist/v/eklausme/saaze-koehntopp" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/eklausme/saaze-koehntopp"><img src="https://img.shields.io/packagist/l/eklausme/saaze-koehntopp" alt="License"></a>
</p>


# Example theme for Simplified Saaze

Here is an example theme, called Koehntopp, modeled after the personal blog of [Kristian K&ouml;hntopp](https://blog.koehntopp.info). This blog itself is based on the [Jekyll](https://jekyllrb.com)-based theme [Type on Strap](https://github.com/sylhare/Type-on-Strap). Some characteristics:
1. Responsive design
2. Based on [Bootstrap-CSS](https://en.wikipedia.org/wiki/Bootstrap_(front-end_framework))
3. Tags
4. Blog
5. RSS feed
6. Search functionality, if you have PHP on the web-server

This koehntopp example will generate a full website for the blog of Kristian K&ouml;hntopp.

Using _Simplified Saaze_ will further provide MathJax, YouTube, Twitter, CodePen, image galleries, and all the other goodies.


# Simplified Saaze

_Simplified Saaze_ is a fast, all-inclusive, flat-file CMS for simple websites and blogs.

Static site builders are fast but normally have a steep learning curve and require lots of tooling to make them work. We believe building a personal site should be stupidly simple. That's why _Simplified Saaze_ is built on the following principles.

* Easy to run - All you need is PHP8, a C compiler, and Composer
* Easy to host - Serve dynamically or statically
* Easy to edit - Edit content using simple Markdown files
* Easy to theme - Templates use plain PHP/HTML
* Fast and secure - No database = less moving parts + more speed
* Simple to understand - Everything is a collection of entries

Read [_Simplified Saaze_](https://eklausmeier.goip.de/blog/2021/10-31-simplified-saaze) for installation and usage.


# Installation

Run
```bash
composer create-project eklausme/saaze-koehntopp
```
This will copy the files of this Git repository, it will also install _Simplified Saaze_. To run _Simplified Saaze_ you still need to compile one C program, install one PECL (PHP extension), and configure one PHP file. This is something you have to do only once.


# Deployment and Usage

The following directories and files only need to be copied if they have been changed:
1. public/assets
2. koehntopp.css

__1. Demo.__ You can view the theme in action here: [koehntopp](/koehntopp). The content is directly from [Kristian K&ouml;hntopp's GitHub page](https://github.com/isotopp/isotopp.github.io).

The source code for the [koehntopp](/koehntopp) theme is here: [eklausme/saaze-koehntopp](https://github.com/eklausme/saaze-koehntopp). It can be installed with [Composer](https://getcomposer.org):
```bash
composer create-project eklausme/saaze-koehntopp
```
This will install the theme and the static site generator in one step. You still need to follow the steps in [Installation](https://eklausmeier.goip.de/blog/2021/10-31-simplified-saaze/#installation), i.e.,
1. make yaml extension available for `php`
2. compile `php_md4c_toHtml.c`

Once everything is installed switch to the directory and run
```bash
time php saaze -d /tmp/build
```
The `time` is only to show you how quick it really is. Runtime on [AMD Ryzen 7 5700G](https://eklausmeier.goip.de/blog/2022/05-03-upgrade-amd-bulldozer-to-cezanne) is less than 0.2 seconds for almost 1,000 blog posts. And for this only a single core is used. The `-d /tmp/build` is used to generate the static HTML file in `/tmp`, which happens to be a RAM disk on Arch Linux. Any other directory will do.

__2. Conversion.__ In case you want to replicate the conversion from the original blog of Kristian K&ouml;hntopp, hitherto using [Hugo](https://gohugo.io), to _Simplified Saaze_ you will proceed as follows:
1. Clone GitHub repository [github.com/isotopp.github.io](https://github.com/isotopp/isotopp.github.io)
2. Manually rename `Manually rename 2019-04-25-what-has-kubernetes-ever-done=for-us.md` to the same file without the equal sign
3. Remove file 2004-02-08-cooties.md, as it is entirely empty
4. Run each content file through Perl script `blogkoehntopp`, i.e., `for i in *.md; do ... done`
5. Change directory to `content/posts` and run Perl script `blogcategory -p ../ *.md > ../cat_and_tags.json`
6. I ran the CSS through [CSS Beautifier](https://www.freeformatter.com/css-beautifier.html)

__3. Comparison.__ Below are the number of lines for configuration and templates, furthermore errors on pages, and runtimes. Runtimes were measured on [AMD Ryzen 7 5700G](https://eklausmeier.goip.de/blog/2022/05-03-upgrade-amd-bulldozer-to-cezanne), max. 5.7 GHz, 64 GB RAM, all files were in RAM disk.

 Hugo                   | Simplified Saaze
------------------------|-----------------------------
config.yaml: 87         | posts.yml+aux.yml: 10
partials:*.html:136     | templates:top+bottom.php:139
[W3 validator errors](https://validator.w3.org/nu/?doc=https%3A%2F%2Fblog.koehntopp.info%2F2022%2F05%2F16%2Ffertig-gelesen-crafting-interpreters.html):8 | [W3 validator errors](https://validator.w3.org/nu/?doc=https%3A%2F%2Feklausmeier.goip.de%2Fkoehntopp%2F2022-05-16-fertig-gelesen-crafting-interpreters%2F):0
hugo build: real 1.15s  | php saaze: real 0.19s
hugo build: user 12.15s | php saaze: user 0.15s

Kristian K&ouml;hntopp [reports runtime](https://blog.koehntopp.info/2021/11/07/this-blog-is-now-hugo-powered.html) for Hugo to be 8.156s on his machine. Apparently, his machine is a slow machine. So according above table based on Ryzen 5700G, _Simplified Saaze_ is more than six times faster than Hugo in real time. Real time is the time, the user actually has to wait for his results, sometimes also called elapsed time. _Simplified Saaze_ is more than 70-times faster than Hugo w.r.t. CPU time. User time is the time all CPUs together needed to compute your result. The AMD Ryzen 7 5700G CPU has 16 logical cores. All these cores were used by Hugo, only one was used for _Simplified Saaze_. More comparison of runtimes between _Simplified Saaze_ and other static site generators are here [Performance Comparison Saaze vs. Hugo vs. Zola](../../2021/11-13-performance-comparison-saaze-vs-hugo-vs-zola).

Kristian K&ouml;hntopp remarks:
> Build time is 0.272s, approximately human reaction time - it's instant.

That's the time Hugo needs for refreshing a single page. At the same time, that's the time _Simplified Saaze_ needs to rebuild the entire 1,000 pages.



# Credits

_Simplified Saaze_ was created by [Elmar Klausmeier](https://eklausmeier.goip.de).

Saaze was created by [Gilbert Pellegrom](https://gilbitron.me) from [Dev7studios](https://dev7studios.co). Released under the MIT license.


