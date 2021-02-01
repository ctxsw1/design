﻿<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, width=device-width"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!-- DNS预解析 -->
<link rel="dns-prefetch" href="//cdn.bootcss.com">
<link rel="dns-prefetch" href="//cdn.jsdelivr.net">
<link rel="shortcut icon" href="<?php $this->options->siteUrl(); ?>favicon.ico">
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?>
        <?php if ($this->is('index')): ?>- <?php $this->options->description() ?><?php endif; ?>
</title>
<link rel="stylesheet" href="<?php $this->options->themeUrl('/style.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/prism.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/owo.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/shortcode.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/animation.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/fontawesome.min.css'); ?>">
<link rel="alternate stylesheet" href="<?php $this->options->themeUrl('css/dark.css'); ?>" type="text/css" title="dark">
</head>
<body id="pjax-container" class="wrapper">
<div id="main">
<div class="menubar"> <div class="mhome"><a <?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></div> <button id="menubutton" disable="enable" onclick="var qr=document.getElementById('menu');if(qr.style.display==='flex'){qr.style.display='none'}else{qr.style.display='flex'}"> <span><i></i><i></i><i></i></span></button> <div id="menu"> <nav id="nav-menu" role="navigation"> <div class="menu menu-logo"> <a class="home_a" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> <div class="navbar-collapse collapse"> <ul class="nav navbar-nav navbar-right"> <li><a <?php if($this->is('index')): ?> class="currents"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
	<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <?php while($pages->next()): ?>
    <li><a <?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
    <?php endwhile; ?></ul> </div> <div class="clearfix"></div> </div></nav> </div> <div class="clearfix"></div> </div>
    <div class="headers animated fadeInDown">
    <div class="site_title_container">
    <?php if ($this->options->cats === "on") : ?>
    <div class="profile-color-modes js-promo-color-modes-banner-profile">
    <a href="javascript:switchNightMode()" target="_self">
    <svg class="hint--right" data-hint="Are you sure you are?" aria-hidden="true" height="45" viewBox="0 0 106 60" fill="none" stroke-width="3"
         stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
        <g class="profile-color-modes-illu-group profile-color-modes-illu-red">
            <path d="M37.5 58.5V57.5C37.5 49.768 43.768 43.5 51.5 43.5V43.5C59.232 43.5 65.5 49.768 65.5 57.5V58.5"></path>
        </g>
        <g class="profile-color-modes-illu-group profile-color-modes-illu-orange">
            <path d="M104.07 58.5C103.401 55.092 97.7635 54.3869 95.5375 57.489C97.4039 54.6411 99.7685 48.8845 94.6889 46.6592C89.4817 44.378 86.1428 50.1604 85.3786 54.1158C85.9519 50.4768 83.7226 43.294 78.219 44.6737C72.7154 46.0534 72.7793 51.3754 74.4992 55.489C74.169 54.7601 72.4917 53.3567 70.5 52.8196"></path>
        </g>
        <g class="profile-color-modes-illu-group profile-color-modes-illu-purple">
            <path d="M5.51109 58.5V52.5C5.51109 41.4543 14.4654 32.5 25.5111 32.5C31.4845 32.5 36.8464 35.1188 40.5111 39.2709C40.7212 39.5089 40.9258 39.7521 41.1245 40"></path>
            <path d="M27.511 49.5C29.6777 49.5 28.911 49.5 32.511 49.5"></path>
            <path d="M27.511 56.5C29.6776 56.5 26.911 56.5 30.511 56.5"></path>
        </g>
        <g class="profile-color-modes-illu-group profile-color-modes-illu-green">
            <circle cx="5.5" cy="12.5" r="4"></circle>
            <circle cx="18.5" cy="5.5" r="4"></circle>
            <path d="M18.5 9.5L18.5 27.5"></path>
            <path d="M18.5 23.5C6 23.5 5.5 23.6064 5.5 16.5"></path>
        </g>
        <g class="profile-color-modes-illu-group profile-color-modes-illu-blue">
            <g class="profile-color-modes-illu-frame">
                <path d="M40.6983 31.5C40.5387 29.6246 40.6456 28.0199 41.1762 27.2317C42.9939 24.5312 49.7417 26.6027 52.5428 30.2409C54.2551 29.8552 56.0796 29.6619 57.9731 29.6619C59.8169 29.6619 61.5953 29.8452 63.2682 30.211C66.0833 26.5913 72.799 24.5386 74.6117 27.2317C75.6839 28.8246 75.0259 33.7525 73.9345 37.5094C74.2013 37.9848 74.4422 38.4817 74.6555 39"></path>
            </g>
            <g class="profile-color-modes-illu-frame">
                <path d="M41.508 31.5C41.6336 31.2259 41.7672 30.9582 41.9085 30.6968C40.7845 26.9182 40.086 21.8512 41.1762 20.2317C42.9939 17.5312 49.7417 19.6027 52.5428 23.2409C54.2551 22.8552 56.0796 22.6619 57.9731 22.6619C59.8169 22.6619 61.5953 22.8452 63.2682 23.211C66.0833 19.5913 72.799 17.5386 74.6117 20.2317C75.6839 21.8246 75.0259 26.7525 73.9345 30.5094C75.1352 32.6488 75.811 35.2229 75.811 38.2283C75.811 38.49 75.8058 38.7472 75.7957 39"></path>
                <path d="M49.4996 33V35.6757"></path>
                <path d="M67.3375 33V35.6757"></path>
            </g>
            <g class="profile-color-modes-illu-frame">
                <path d="M41.508 31.5C41.6336 31.2259 41.7672 30.9582 41.9085 30.6968C40.7845 26.9182 40.086 21.8512 41.1762 20.2317C42.9939 17.5312 49.7417 19.6027 52.5428 23.2409C54.2551 22.8552 56.0796 22.6619 57.9731 22.6619C59.8169 22.6619 61.5953 22.8452 63.2682 23.211C66.0833 19.5913 72.799 17.5386 74.6117 20.2317C75.6839 21.8246 75.0259 26.7525 73.9345 30.5094C75.1352 32.6488 75.811 35.2229 75.811 38.2283C75.811 38.49 75.8058 38.7472 75.7957 39"></path>
            </g>
            <g class="profile-color-modes-illu-frame">
                <path d="M41.508 31.5C41.6336 31.2259 41.7672 30.9582 41.9085 30.6968C40.7845 26.9182 40.086 21.8512 41.1762 20.2317C42.9939 17.5312 49.7417 19.6027 52.5428 23.2409C54.2551 22.8552 56.0796 22.6619 57.9731 22.6619C59.8169 22.6619 61.5953 22.8452 63.2682 23.211C66.0833 19.5913 72.799 17.5386 74.6117 20.2317C75.6839 21.8246 75.0259 26.7525 73.9345 30.5094C75.1352 32.6488 75.811 35.2229 75.811 38.2283C75.811 38.49 75.8058 38.7472 75.7957 39"></path>
                <path d="M49.4996 33V35.6757"></path>
                <path d="M67.3375 33V35.6757"></path>
            </g>
            <g class="profile-color-modes-illu-frame">
                <path d="M41.508 31.5C41.6336 31.2259 41.7672 30.9582 41.9085 30.6968C40.7845 26.9182 40.086 21.8512 41.1762 20.2317C42.9939 17.5312 49.7417 19.6027 52.5428 23.2409C54.2551 22.8552 56.0796 22.6619 57.9731 22.6619C59.8169 22.6619 61.5953 22.8452 63.2682 23.211C66.0833 19.5913 72.799 17.5386 74.6117 20.2317C75.6839 21.8246 75.0259 26.7525 73.9345 30.5094C75.1352 32.6488 75.811 35.2229 75.811 38.2283C75.811 38.49 75.8058 38.7472 75.7957 39"></path>
            </g>
            <g class="profile-color-modes-illu-frame">
                <path d="M41.508 31.5C41.6336 31.2259 41.7672 30.9582 41.9085 30.6968C40.7845 26.9182 40.086 21.8512 41.1762 20.2317C42.9939 17.5312 49.7417 19.6027 52.5428 23.2409C54.2551 22.8552 56.0796 22.6619 57.9731 22.6619C59.8169 22.6619 61.5953 22.8452 63.2682 23.211C66.0833 19.5913 72.799 17.5386 74.6117 20.2317C75.6839 21.8246 75.0259 26.7525 73.9345 30.5094C75.1352 32.6488 75.811 35.2229 75.811 38.2283C75.811 38.49 75.8058 38.7472 75.7957 39"></path>
                <path d="M49.4996 33V35.6757"></path>
                <path d="M67.3375 33V35.6757"></path>
            </g>
            <g class="profile-color-modes-illu-frame">
                <path d="M73.4999 40.2236C74.9709 38.2049 75.8108 35.5791 75.8108 32.2283C75.8108 29.2229 75.1351 26.6488 73.9344 24.5094C75.0258 20.7525 75.6838 15.8246 74.6116 14.2317C72.7989 11.5386 66.0832 13.5913 63.2681 17.211C61.5952 16.8452 59.8167 16.6619 57.973 16.6619C56.0795 16.6619 54.2549 16.8552 52.5427 17.2409C49.7416 13.6027 42.9938 11.5312 41.176 14.2317C40.0859 15.8512 40.7843 20.9182 41.9084 24.6968C41.003 26.3716 40.4146 28.3065 40.2129 30.5"></path>
                <path d="M82.9458 30.5471L76.8413 31.657"></path>
                <path d="M76.2867 34.4319L81.8362 37.7616"></path>
                <path d="M49.4995 27.8242V30.4999"></path>
                <path d="M67.3374 27.8242V30.4998"></path>
            </g>
            <g class="profile-color-modes-illu-frame">
                <path d="M45.3697 34.2658C41.8877 32.1376 39.7113 28.6222 39.7113 23.2283C39.7113 20.3101 40.3483 17.7986 41.4845 15.6968C40.3605 11.9182 39.662 6.85125 40.7522 5.23168C42.5699 2.53117 49.3177 4.6027 52.1188 8.24095C53.831 7.85521 55.6556 7.66186 57.5491 7.66186C59.3929 7.66186 61.1713 7.84519 62.8442 8.21095C65.6593 4.59134 72.375 2.5386 74.1877 5.23168C75.2599 6.82461 74.6019 11.7525 73.5105 15.5094C74.7112 17.6488 75.3869 20.2229 75.3869 23.2283C75.3869 28.6222 73.2105 32.1376 69.7285 34.2658C70.8603 35.5363 72.6057 38.3556 73.3076 40"></path>
                <path d="M49.0747 19.8242V22.4999"></path>
                <path d="M54.0991 28C54.6651 29.0893 55.7863 30.0812 57.9929 30.0812C59.0642 30.0812 59.8797 29.8461 60.5 29.4788"></path>
                <path d="M66.9126 19.8242V22.4999"></path>
                <path d="M33.2533 20.0237L39.0723 22.1767"></path>
                <path d="M39.1369 25.0058L33.0935 27.3212"></path>
                <path d="M81.8442 19.022L76.0252 21.1751"></path>
                <path d="M75.961 24.0041L82.0045 26.3196"></path>
            </g>
            <g class="profile-color-modes-illu-frame">
                <path d="M73.4999 40.2236C74.9709 38.2049 75.8108 35.5791 75.8108 32.2283C75.8108 29.2229 75.1351 26.6488 73.9344 24.5094C75.0258 20.7525 75.6838 15.8246 74.6116 14.2317C72.7989 11.5386 66.0832 13.5913 63.2681 17.211C61.5952 16.8452 59.8167 16.6619 57.973 16.6619C56.0795 16.6619 54.2549 16.8552 52.5427 17.2409C49.7416 13.6027 42.9938 11.5312 41.176 14.2317C40.0859 15.8512 40.7843 20.9182 41.9084 24.6968C41.003 26.3716 40.4146 28.3065 40.2129 30.5"></path>
                <path d="M82.9458 30.5471L76.8413 31.657"></path>
                <path d="M76.2867 34.4319L81.8362 37.7616"></path>
                <path d="M49.4995 27.8242V30.4999"></path>
                <path d="M67.3374 27.8242V30.4998"></path>
            </g>
            <g class="profile-color-modes-illu-frame">
                <path d="M40.6983 31.5C40.5387 29.6246 40.6456 28.0199 41.1762 27.2317C42.9939 24.5312 49.7417 26.6027 52.5428 30.2409C54.2551 29.8552 56.0796 29.6619 57.9731 29.6619C59.8169 29.6619 61.5953 29.8452 63.2682 30.211C66.0833 26.5913 72.799 24.5386 74.6117 27.2317C75.6839 28.8246 75.0259 33.7525 73.9345 37.5094C74.2013 37.9848 74.4422 38.4817 74.6555 39"></path>
            </g>
        </g>
    </svg>
  </a>
</div>
<?php endif; ?>
            <div class="my_socials">
            <a href="https://github.com/<?php $this->options->github();?>" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://weibo.com/<?php $this->options->weibo();?>" target="_blank"><i class="fab fa-weibo"></i></a>
            <a href="https://wpa.qq.com/msgrd?v=3&uin=<?php $this->options->qq();?>&site=qq&menu=yes" target="_blank"><i class="fab fa-qq"></i></a>
            <a href="https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php $this->options->email();?>" target="_blank"><i class="fas fa-envelope"></i></a>
        </div>
        <div class="description">
        <div class="with_font">
        <a href="<?php $this->options->siteUrl(); ?>">
        <img class="custom-header" src="<?php $this->options->toux();?>" alt=""></a>
</div>
</div>
</div>
</div>