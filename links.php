<?php
/**
 * 友链
 *
 * @package custom
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="autopagerize_page_element">
  <div class="content">
    <div class="post_page">
      <div class="post animated fadeInDowns">
        <div class="post_title post_detail_title">
          <h2><?php $this->title() ?></h2>
        </div>
      <div class="post_content markdown">
        <div class="friends">
      	<?php if (isset($this->options->plugins['activated']['Links'])) : ?>
					<?php Links_Plugin::output("
					<li class='clear'>
						<a href='{url}' target='_blank'>
						<div class='links-back'>
						<div class='link-item-content'>
						<span class='title-img' style='{image}' alt='{name}' >
						<span class='title-text'>{name}</span>
						</spn>
						<span class='description-wrapper'>{description}</span>
						</div>
						</a>
					</li>
					", 0); ?>
				<?php else: ?>
				<?php Links(); ?>
				<?php endif; ?>
			</div>
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
<div class="post_footer"> </div>
</div>
</div>
</div>
<?php $this->need('comments.php'); ?>
</div></div>
<?php $this->need('footer.php'); ?>