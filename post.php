<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="thumb_content">
    <div class="post_page">
      <div class="thumb_post animated fadeInDowns">
        <div class="post_content markdown">
        <?php
			$db = Typecho_Db::get();
			$sql = $db->select()->from('table.comments')
			    ->where('cid = ?',$this->cid)
			    ->where('mail = ?', $this->remember('mail',true))
			    ->where('status = ?', 'approved')
			//只有通过审核的评论才能看回复可见内容
			    ->limit(1);
			$result = $db->fetchAll($sql);
			if($this->user->hasLogin() || $result) {
			    $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2see">$1</div>',$this->content);
			}
			else{
			    $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2see">此处内容需要评论回复后方可阅读。</div>',$this->content);
			}

			emotionContent($content);
		?>
		</div>
		<div class="post_eof"><span>END</span></div>
<?php if ($this->options->LicenseInfo !== '0'): ?>
<p class="license"><?php echo $this->options->LicenseInfo ? $this->options->LicenseInfo : '本作品采用 <a href="https://creativecommons.org/licenses/by-sa/4.0/" target="_blank" rel="license nofollow">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可。' ?></p>
<?php endif; ?>
</div>
</div>
</div>
<?php $this->need('comments.php'); ?>
</div>
</div>
<?php $this->need('footer.php'); ?>