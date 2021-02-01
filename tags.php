<?php
/**
 * 归档
 *
 * @package custom
 */
$this->need('header.php'); ?>
<div class="autopagerize_page_element">
  <div class="content">
    <div class="post_page">
	<div class="post animated fadeInDowns">
	    <?php if ($this->options->JCountDownStatus === "on") : ?>
        <div class="aside aside-count">
            <div class="post_title post_detail_title">
                <h2>人生倒计时</h2>
                </div>
            <div class="content">
                <div class="item" id="dayProgress">
                    <div class="title">今日已经过去<span></span>小时</div>
                    <div class="progress">
                        <div class="progress-bar">
                            <div class="progress-inner progress-inner-1"></div>
                        </div>
                        <div class="progress-percentage"></div>
                    </div>
                </div>
                <div class="item" id="weekProgress">
                    <div class="title">这周已经过去<span></span>天</div>
                    <div class="progress">
                        <div class="progress-bar">
                            <div class="progress-inner progress-inner-2"></div>
                        </div>
                        <div class="progress-percentage"></div>
                    </div>
                </div>
                <div class="item" id="monthProgress">
                    <div class="title">本月已经过去<span></span>天</div>
                    <div class="progress">
                        <div class="progress-bar">
                            <div class="progress-inner progress-inner-3"></div>
                        </div>
                        <div class="progress-percentage"></div>
                    </div>
                </div>
                <div class="item" id="yearProgress">
                    <div class="title">今年已经过去<span></span>个月</div>
                    <div class="progress">
                        <div class="progress-bar">
                            <div class="progress-inner progress-inner-4"></div>
                        </div>
                        <div class="progress-percentage"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
	<div class="post_title post_detail_title">
    <h2><?php _e('标签'); ?></h2>
    </div>
	<div id="theme-tagcloud" class="tagcloud-wrap">
			<?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
			<?php while($tags->next()): ?>
			<a style="font-size:12px; text-transform:capitalize;" href="<?php $tags->permalink(); ?>">#&ensp;<?php $tags->name(); ?></a>
			<?php endwhile; ?>
            </div>
            <section id="wrappe" class="home">
    <div class="post_title post_detail_title">
    <h2><?php $this->title() ?></h2>
    </div>
			<?php
$this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
    $year=0; $mon=0; $i=0; $j=0;  
    while($archives->next()):   
        $year_tmp = date('Y',$archives->created);   
        $mon_tmp = date('m',$archives->created);   
        $y=$year; $m=$mon;   
        if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
        if ($year != $year_tmp && $year > 0) $output .= '</ul>';   
        if ($year != $year_tmp) {   
            $year = $year_tmp;   
            @$output .= '<h3 class="tagsh3">'. $year .'</h3><ul class="post-list" id="post-list">'; //输出年份   
        }    
        $output .= '<li class="post-item"><div class="meta"><time datetime="'.date('m-d ',$archives->created).'" itemprop="datePublished">'.date('m-d ',$archives->created).'</time><a class="titags" href="'.$archives->permalink .'">'. $archives->title .'</a></div></li>'; //输出文章日期和标题   
    endwhile;   
    $output .= '</ul>';
    echo $output;
?>

            </section>
        </div>
 <div class="post_footer"></div>
</div></div></div>
<?php $this->need('footer.php'); ?>
</div>