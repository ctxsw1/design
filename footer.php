</div></div>
<div id="colophon" class="footer">
<div class="powered_by">
<p class="copyright">Copyright&copy;2019-<?php echo date('Y'); ?><br>Designed & Coded by <a href="https://yolen.cn/" target="_blank">Yolen</a> Load：<?php echo timer_stop();?><br><a href="https://beian.miit.gov.cn/" target="_blank"><?php $this->options->beian(); ?></a></p></div>
<div class="go-top dn" id="go-top">
    <a href="javascript:;" class="go"><i class="far fa-rocket"></i></a>
</div>
<div class="go-tops" id="go-top">
<a href="javascript:switchNightMode()" target="_self"><i class="far fa-sun"></i></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.1/dist/jquery.min.js"></script>
<script src="<?php $this->options->themeUrl('js/system.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/prism.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/index.js'); ?>"></script>
<script>
    $("a[href*='http://']:not([href*='"+location.hostname+"']),[href*='https://']:not([href*='"+location.hostname+"'])").addClass("external").attr("target","_blank");
</script>
<script>
jQuery(document).ready(function () {
    jQuery.viewImage({
        'target': '.markdown img, .grid-item img',
        'exclude': '.OwO .OwO-body .OwO-items .OwO-item img,.friends li img,#music_btn01',
        'delay': 270
    });
});
</script>
</body>
</html>
<?php if ($this->options->compressHtml): $html_source = ob_get_contents(); ob_clean(); print compressHtml($html_source); ob_end_flush(); endif; ?>