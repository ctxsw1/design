<?php
 /**
 * 动态
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
      <div class="post_content markdownw">
<?php
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<li id="li-<?php $comments->theId(); ?>" class="comment-bodyw<?php
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">

<div id="<?php $comments->theId(); ?>">
        <div class="comment-innerw">
            <?php $email=$comments->mail; $imgUrl = getGravatar($email);echo '<img class="avatarw" src="'.$imgUrl.'">'; ?>
            <div class="new-commentw">
                <span class="comment-meta-timew"><?php $comments->date('Y-m-d H:i'); ?></span>
            </div>
            <div class="comment-contentw">
                <?php
                $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
		        $replacement = '<a href="$1" data-fancybox="gallery" /><img src="$1" alt="'.$content->title.'" title="点击放大图片"></a>';
		        $content = preg_replace($pattern, $replacement, $content->content);
                $cos = preg_replace('#\@\((.*?)\)#','<img src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.0.3/G/IMG/bq/$1.png" class="bq">',$comments->content);
                echo $cos;
              ?>
            </div>
        </div>
    </li>

<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>


<div id="commentss">
    <?php $this->comments()->to($comments); ?>
    <div class="comments-header" id="<?php $this->respondId(); ?>" >
        <?php if($this->allow('comment')): ?>
        <h3 id="response" class="widget-title text-left comment-title"><span class="nice-b-line"><?php $this->commentsNum(_t('发表动态'), _t('已记录 1 条动态'), _t(' %d 条动态')); ?></span></h3>
          <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
              <?php if($this->user->hasLogin()): ?>
              <p>
                  <input name="_" type="hidden" id="comment_" value="<?php echo Helper::security()->getToken(str_replace(array('?_pjax=%23pjax-container', '&_pjax=%23pjax-container'), '', Typecho_Request::getInstance()->getRequestUrl()));?>"/>
                  <textarea rows="5" name="text" id="textarea" placeholder="发表您的新鲜事儿..." style="resize:none;"><?php $this->remember('text'); ?></textarea>
              </p>
              <div class="clear">
                <div class="OwO-logo" onclick="OwO_show()">
                  <span><i class="far fa-smile-beam"></i></span>
                </div>
                <button type="submit" class="submit"><?php _e('发表'); ?></button>
              </div>
              <div id="OwO-container"><?php  $this->need('owo.php'); ?></div>
          </form>
          <?php endif; ?>
        <?php endif; ?>
	  </div>
    <?php if ($comments->have()): ?>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav('<svg t="1607661285211" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="8430" width="200" height="200"><path d="M889.1914 955.2978c0 5.4016-2.8621 10.6404-7.9217 13.44-5.0616 2.7996-11.0193 2.4453-15.5955-0.426L191.0886 545.4162c-4.3295-2.7126-7.1997-7.5305-7.1997-13.014s2.8733-10.3014 7.1987-13.014L865.6732 96.4915c4.5773-2.8703 10.5339-3.2246 15.5955-0.426 5.0596 2.8006 7.9217 8.0384 7.9217 13.44V955.2977920000001L889.1914 955.2978z" p-id="8431"></path></svg>', '<svg t="1607661295319" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="8556" width="200" height="200"><path d="M134.8086 68.7022c0-5.4016 2.8621-10.6404 7.9217-13.44 5.0616-2.7996 11.0193-2.4453 15.59549999 0.426L832.9114 478.5838c4.32949999 2.7126 7.1997 7.5305 7.1997 13.014s-2.8733 10.3014-7.1987 13.014L158.32680001 927.5085c-4.5773 2.87029999-10.5339 3.2246-15.59550001 0.426-5.0596-2.8006-7.9217-8.0384-7.9217-13.44L134.8096 68.702208 134.8086 68.7022z" p-id="8557"></path></svg>'); ?>
    <?php endif; ?>
</div>
</div>
<div class="post_footer"> </div>
</div>
</div>
</div>
<?php $this->need('footer.php'); ?>