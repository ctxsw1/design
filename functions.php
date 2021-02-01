<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
    echo "<link rel='stylesheet' href='".__TYPECHO_THEME_DIR__."/design/css/setting.css'/>";
    //感谢小歪api随机图调用
    echo "
    <div id='art-box' style='background-image: url(https://api.ixiaowai.cn/gqapi/gqapi.php)'>
       <div id='ab-mask'>
         <div id=ab-content>
           <p>主题设置</p>
         </div>
       </div>
     </div>";

$sticky = new Typecho_Widget_Helper_Form_Element_Text('sticky', NULL,NULL, _t('文章置顶'), _t('置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔'));
 $form->addInput($sticky);

$toux = new Typecho_Widget_Helper_Form_Element_Text('toux', NULL, NULL, _t('个人头像'), _t('在这里输入头像地址'));
 $form->addInput($toux);

$defaultPostIMG = new Typecho_Widget_Helper_Form_Element_Text('defaultPostIMG', NULL, NULL, _t('没有设置文章头图就用这里的图片') , _t('https://...'));
 $form->addInput($defaultPostIMG);

$wrapperIMG = new Typecho_Widget_Helper_Form_Element_Text('wrapperIMG', NULL, NULL, _t('全站背景图') , _t('https://...'));
 $form->addInput($wrapperIMG);

$github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('Github'), _t('在这里输入github用户名'));
 $form->addInput($github);
  
$weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, NULL, _t('微博'), _t('在这里输入微博用户名'));
 $form->addInput($weibo);
  
$qq = new Typecho_Widget_Helper_Form_Element_Text('qq', NULL, NULL, _t('QQ'), _t('在这里输入QQ账号'));
 $form->addInput($qq);
  
$email = new Typecho_Widget_Helper_Form_Element_Text('email', NULL, NULL, _t('邮箱'), _t('在这里输入邮箱地址'));
 $form->addInput($email);

$beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, NULL, _t('备案号') , _t('没备案当我没说'));
 $form->addInput($beian);
 
$LicenseInfo = new Typecho_Widget_Helper_Form_Element_Text('LicenseInfo', NULL, NULL, _t('文章版权信息'), _t('填入后将在文章底部显示你填入的版权信息（支持HTML标签，输入数字“0”可关闭显示），留空则默认使用 (CC BY-SA 4.0)国际许可协议。'));
$form->addInput($LicenseInfo); 

$Links = new Typecho_Widget_Helper_Form_Element_Textarea('Links', NULL, NULL, _t('友情链接'), _t('按照格式输入链接信息，格式：<br><strong>名称,地址,描述,头像</strong><br>不同信息之间用英文逗号“,”分隔，例如：<br><strong>梦不落,https://yolen.cn/,记录自己更欣赏你们,https:/yolen.cn/favicon.ico</strong><br>多个链接换行即可，一行一个'));
    $form->addInput($Links);

$catalog = new Typecho_Widget_Helper_Form_Element_Radio('catalog', 
	array('post' => _t('使用文章内设定'),
	'open' => _t('全部启用'),
	0 => _t('全部关闭')),
	'post', _t('文章目录'), _t('一键开关全部文章目录，默认使用文章内的设定，（若文章内无任何标题，则不显示目录）'));
$form->addInput($catalog);

$compressHtml = new Typecho_Widget_Helper_Form_Element_Radio('compressHtml', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('HTML压缩'), _t('默认关闭，启用则会对HTML代码进行压缩，可能与部分插件存在兼容问题，请酌情选择开启或者关闭'));
$form->addInput($compressHtml);

$cats = new Typecho_Widget_Helper_Form_Element_Select(
    'cats',
    array(
        'off' => '关闭（默认）',
        'on' => '开启',
    ),
        'off',
        '是否开启头部猫咪动画',
        '介绍：开启后头部将显示猫咪动画'
);
$cats->setAttribute('class', 'typecho-option');
    $form->addInput($cats->multiMode());

$JCountDownStatus = new Typecho_Widget_Helper_Form_Element_Select(
    'JCountDownStatus',
    array(
        'off' => '关闭（默认）',
        'on' => '开启',
    ),
        'off',
        '是否开启人生倒计时',
        '介绍：开启后归档页面将显示人生倒计时'
);
$JCountDownStatus->setAttribute('class', 'typecho-option');
    $form->addInput($JCountDownStatus->multiMode());

$db = Typecho_Db::get();
    $sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:design'));
    $ysj = $sjdq['value'];
    if(isset($_POST['type']))
    {
    if($_POST["type"]=="备份模板数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:designbf'))){
    $update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:designbf');
    $updateRows= $db->query($update);
    echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    if($ysj){
         $insert = $db->insert('table.options')->rows(array('name' => 'theme:designbf','user' => '0','value' => $ysj));
         $insertId = $db->query($insert);
    echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }
    }
            }
    if($_POST["type"]=="还原模板数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:designbf'))){
    $sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:designbf'));
    $bsj = $sjdub['value'];
    $update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:design');
    $updateRows= $db->query($update);
    echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
    <?php
    }else{
    echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
    }
    }
    if($_POST["type"]=="删除备份数据"){
    if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:designbf'))){
    $delete = $db->delete('table.options')->where ('name = ?', 'theme:designbf');
    $deletedRows = $db->query($delete);
    echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
    ?>
    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
    <?php
    }else{
    echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
    }
    }
    }
    echo '<div id="backup"><form class="protected Data-backup" action="?designbf" method="post"><h4>数据备份</h4>
    <input type="submit" name="type" class="btn btn-s" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form></div>';
}

//自定义字段
function themeFields(Typecho_Widget_Helper_Layout $layout)
{
    $thumb = new Typecho_Widget_Helper_Form_Element_Text('thumb', NULL, NULL, _t('自定义缩略图'), _t('在这里填入一个图片 URL 地址, 以添加本文的缩略图，若填入纯数字，例如 <b>3</b> ，则使用文章第三张图片作为缩略图（对应位置无图则不显示缩略图），留空则默认不显示缩略图'));
	$thumb->input->setAttribute('class', 'w-100');
	$layout->addItem($thumb);
    
    $catalog = new Typecho_Widget_Helper_Form_Element_Radio('catalog', 
	array(1 => _t('启用'),
	0 => _t('关闭')),
	0, _t('文章目录'), _t('默认关闭，启用则会在文章内显示“文章目录”（若文章内无任何标题，则不显示目录），需要在“控制台-设置外观-文章目录”启用“使用文章内设定”后，方可生效'));
	$layout->addItem($catalog);
}

function GetOriginalContent($id){
  $db = Typecho_Db::get();
  $result = $db->fetchAll($db->select()->from('table.contents')
    ->where('status = ?','publish')
    ->where('type = ?', 'post')
    ->where('cid = ?',$id)
  );
  foreach($result as $val){
    $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
    $content = $val['text'];
    return $content;
  }
}

function getCommentAt($coid){
        $db   = Typecho_Db::get();
        $prow = $db->fetchRow($db->select('parent')
            ->from('table.comments')
            ->where('coid = ? AND status = ?', $coid, 'approved'));
        $parent = $prow['parent'];
        if ($parent != "0") {
            $arow = $db->fetchRow($db->select('author')
                ->from('table.comments')
                ->where('coid = ? AND status = ?', $parent, 'approved'));
            $author = $arow['author'];
            if($author){
            	$href   = '<a class="at" href="#comment-'.$parent.'">@'.$author.'</a>';
        	}else{
        		$href   = '<a href="javascript:void(0)">评论审核中···</a>';
        	}
            echo $href;
        } else {
            echo "";
        }
    }


//感谢泽泽大佬的代码
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('Gx','reply2see');
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Gx','reply2see');
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('Gx', 'addButton');
Typecho_Plugin::factory('admin/write-page.php')->bottom = array('Gx', 'addButton');

class Gx {

    public static function reply2see($con,$obj,$text)
    {
      $text = empty($text)?$con:$text;
      if(!$obj->is('single')){
        $text = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'',$text);
      }
      return $text;
    }

    public static function addButton()
    {
      echo '<link rel="stylesheet" href="/usr/themes/design/css/owo.css">';

        echo '
        <style>
          .wmd-button-row{
            height:auto;
          }
          .wmd-button{
            color:#999;
          }
          .OwO{
            background:#fff;
          }
          #g-shortcode{
            line-height: 30px;
            background:#fff;
          }
          #g-shortcode a{
            cursor: pointer;
            font-weight:bold;
            font-size:14px;
            text-decoration:none;
            color: #999 !important;
            margin:5px;
            display:inline-block;
          }
        </style>
        ';
        echo '<script src="/usr/themes/design/js/editor.js"></script>' ;

    }

}

require_once __DIR__ . '/lib/Parsedown.php';
require_once __DIR__ . '/lib/shortcode.php';

/**
* 文章内容解析（短代码，表情）
*
* @access public
* @param mixed
* @return
*/
function emotionContent($content)
{
    //HyperDown解析
    //$Parsedown = new Parsedown();
    //$content =  $Parsedown->text($content);
    //表情解析
    $fcontent = preg_replace('#\@\((.*?)\)#','<img src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.5/G/IMG/bq/$1.png" class="bq">',$content);
    //感谢Maicong大佬的短代码解析QwQ
    $fcontent = do_shortcode($fcontent);
    //输出最终结果
    echo $fcontent;
}

/**
* 文章内容解析（短代码，表情）
*
* @access public
* @param mixed
* @return
*/
function shortcodeContent($content)
{
    $Parsedown = new Parsedown();
    $fcontent =  $Parsedown->text($content);
    $fcontent = preg_replace('#\@\((.*?)\)#','<img src="https://cdn.jsdelivr.net/gh/youranreus/R@v1.1.5/G/IMG/bq/$1.png" class="bq">',$fcontent);
    return $fcontent;
}


//获取Gravatar头像 QQ邮箱取用qq头像
function getGravatar($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array())
{
preg_match_all('/((\d)*)@qq.com/', $email, $vai);
if (empty($vai['1']['0'])) {
    $url = 'https://gravatar.yyer.net/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
}else{
    $url = 'https://q1.qlogo.cn/headimg_dl?dst_uin='.$vai['1']['0'].'&spec=100';
}
return  $url;
}

//通过id获取文章信息
function GetPostById($id){

		$db = Typecho_Db::get();
		$result = $db->fetchAll($db->select()->from('table.contents')
			->where('status = ?','publish')
			->where('type = ?', 'post')
			->where('cid = ?',$id)
		);
		if($result){
			$i=1;
			foreach($result as $val){
				$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
				$post_title = htmlspecialchars($val['title']);
				$post_permalink = $val['permalink'];
        $post_date = $val['created'];
        $post_date = date('Y-m-d',$post_date);
				return '<div class="ArtinArt">
                  <h4><a href="'.$post_permalink.'">'.$post_title.'</a></h4>
                  <p class="clear"><span style="float:left">ID:'.$id.'</span><span style="float:right">'.$post_date.'</span></p>
                </div>';
			}
		}
    else{
      return '<span>id无效QAQ</span>';
    }
}

//时间友好化
function formatTime($time)
{
    $text = '';
    $time = intval($time);
    $ctime = time();
    $t = $ctime - $time; //时间差
    if ($t < 0) {
        return date('Y-m-d', $time);
    }
    ;
    $y = date('Y', $ctime) - date('Y', $time);//是否跨年
    switch ($t) {
        case $t == 0:
            $text = '刚刚';
            break;
        case $t < 60://一分钟内
            $text = $t . '秒前';
            break;
        case $t < 3600://一小时内
            $text = floor($t / 60) . '分钟前';
            break;
        case $t < 86400://一天内
            $text = floor($t / 3600) . '小时前'; // 一天内
            break;
        case $t < 2592000://30天内
            if($time > strtotime(date('Ymd',strtotime("-1 day")))) {
                $text = '昨天';
            } elseif($time > strtotime(date('Ymd',strtotime("-2 days")))) {
                $text = '前天';
            } else {
                $text = floor($t / 86400) . '天前';
            }
            break;
        case $t < 31536000 && $y == 0://一年内 不跨年
            $m = date('m', $ctime) - date('m', $time) -1;

            if($m == 0) {
                $text = floor($t / 86400) . '天前';
            } else {
                $text = $m . '个月前';
            }
            break;
        case $t < 31536000 && $y > 0://一年内 跨年
            $text = (11 - date('m', $time) + date('m', $ctime)) . '个月前';
            break;
        default:
            $text = (date('Y', $ctime) - date('Y', $time)) . '年前';
            break;
    }

    return $text;
}

//文章阅读时间统计
function art_time ($cid){
  $db=Typecho_Db::get ();
  $rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
  $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
  $text_word = mb_strlen($text,'utf-8');
  echo ceil($text_word / 400);
}

//文章字数统计
function  art_count ($cid){
    $db=Typecho_Db::get ();
    $rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
    $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
    echo mb_strlen($text,'UTF-8');
}

//评论锚点修复
function Comment_hash_fix($archive){
  $header = "<script type=\"text/javascript\">
  (function () {
      window.TypechoComment = {
          dom : function (id) {
              return document.getElementById(id);
          },

          create : function (tag, attr) {
              var el = document.createElement(tag);

              for (var key in attr) {
                  el.setAttribute(key, attr[key]);
              }

              return el;
          },
          reply : function (cid, coid) {
              var comment = this.dom(cid), parent = comment.parentNode,
                  response = this.dom('" . $archive->respondId . "'), input = this.dom('comment-parent'),
                  form = 'form' == response.tagName ? response : response.getElementsByTagName('form')[0],
                  textarea = response.getElementsByTagName('textarea')[0];
              if (null == input) {
                  input = this.create('input', {
                      'type' : 'hidden',
                      'name' : 'parent',
                      'id'   : 'comment-parent'
                  });
                  form.appendChild(input);
              }
              input.setAttribute('value', coid);
              if (null == this.dom('comment-form-place-holder')) {
                  var holder = this.create('div', {
                      'id' : 'comment-form-place-holder'
                  });
                  response.parentNode.insertBefore(holder, response);
              }
              comment.appendChild(response);
              this.dom('cancel-comment-reply-link').style.display = '';
              if (null != textarea && 'text' == textarea.name) {
                  textarea.focus();
              }
              return false;
          },
          cancelReply : function () {
              var response = this.dom('{$archive->respondId}'),
              holder = this.dom('comment-form-place-holder'), input = this.dom('comment-parent');
              if (null != input) {
                  input.parentNode.removeChild(input);
              }
              if (null == holder) {
                  return true;
              }
              this.dom('cancel-comment-reply-link').style.display = 'none';
              holder.parentNode.insertBefore(response, holder);
              return false;
          }
      };
  })();
  </script>
  ";
  return $header;
}

//文章阅读次数
function get_post_view($archive)
{
$cid = $archive->cid;
$db = Typecho_Db::get();
$prefix = $db->getPrefix();
if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
$db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
echo 0;
return;
}
$row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
if ($archive->is('single')) {
$db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
}
echo $row['views'];
}

//新窗口打开
function parseContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    if(!empty($options->src_add) && !empty($options->cdn_add)){
        $obj->content = str_ireplace($options->src_add,$options->cdn_add,$obj->content);
    }
    $obj->content = preg_replace("/<a href=\"([^\"]*)\">/i", "<a href=\"\\1\" target=\"_blank\">", $obj->content);
    echo trim($obj->content);
    }

//显示下一篇
function theNext($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created > ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_ASC)
->limit(1);
$content = $db->fetchRow($sql);
 
if ($content) {
$content = $widget->filter($content);
$link = '<a href="' . $content['permalink'] . '" title="' . $content['title'] . '">下一篇<svg t="1611154830538" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4033" width="200" height="200"><path d="M269.741467 934.658206c33.252335 33.251312 87.164199 33.251312 120.416534 0l361.248577-361.248578c33.252335-33.252335 33.252335-87.164199 0-120.416533l-0.714267-0.706082-1.302669-1.339507L388.141064 89.698928c-33.252335-33.251312-87.164199-33.251312-120.416533 0-33.252335 33.252335-33.252335 87.164199 0 120.416534l303.075666 303.083853-301.05873 301.042357c-33.252335 33.251312-33.252335 87.164199 0 120.416534z" p-id="4034"></path></svg></a>';
echo $link;
} else {
echo $default;
}
} 

//显示上一篇
function thePrev($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created < ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_DESC)
->limit(1);
$content = $db->fetchRow($sql); 
if ($content) {
$content = $widget->filter($content);
$link = '<a href="' . $content['permalink'] . '" title="' . $content['title'] . '"><svg t="1611154790716" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3472" width="200" height="200"><path d="M749.389642 89.698928c-33.252335-33.251312-87.164199-33.251312-120.416534 0L267.724531 450.947506c-33.252335 33.252335-33.252335 87.164199 0 120.416533l0.714267 0.706081 1.302669 1.339508 361.248578 361.248578c33.252335 33.251312 87.164199 33.251312 120.416533 0 33.252335-33.252335 33.252335-87.164199 0-120.416534L448.330912 511.157819l301.05873-301.042357c33.252335-33.252335 33.252335-87.164199 0-120.416534z" p-id="3473"></path></svg>上一篇</a>';
echo $link;
} else {
echo $default;
}
}

//评论者认证    
function commentApprove($widget, $email = NULL)      
{      
    if (empty($email)) return;      
    //认证用户，再次添加认证用户邮箱      
    $handsome = array(      
        '544672716@qq.com',
        'love@muuzi.cn',
        '284993019@qq.com',
        '1466996001@qq.com',
        'gatesx@foxmail.com',
        '3308869544@qq.com'
    );      
    if ($widget->authorId == $widget->ownerId) {      
        echo '<span class="vip">&thinsp;<i class="fas fa-user-secret" style="color:#ff9901"></i></span>';
    } else if (in_array($email, $handsome)) {      
        echo '<span class="vip_user">&thinsp;<i class="fas fa-user-friends" style="color:#5b66ea"></i></span>';
    }      
}

//评论用户新窗口打开
function CommentAuthor($obj, $autoLink = NULL, $noFollow = NULL) {    //后两个参数是原生函数自带的，为了保持原生属性，我并没有删除，原版保留
    $options = Helper::options();
    $autoLink = $autoLink ? $autoLink : $options->commentsShowUrl;    //原生参数，控制输出链接
    $noFollow = $noFollow ? $noFollow : $options->commentsUrlNofollow;    //原生参数，控制输出链接额外属性
    if ($obj->url && $autoLink) {
        echo '<a href="'.$obj->url.'"'.($noFollow ? ' rel="external nofollow"' : NULL).(strstr($obj->url, $options->index) == $obj->url ? NULL : ' target="_blank"').'>'.$obj->author.'</a>';
    } else {
        echo $obj->author;
    }
}

//免插件实现友情链接功能
function Links($sorts = NULL) {
    $options = Typecho_Widget::widget('Widget_Options');
    $link = NULL;
    if ($options->Links) {
        $list = explode("\r\n", $options->Links);
        foreach ($list as $val) {
            list($name, $url, $description, $img,) = explode(",", $val);
            if ($sorts) {
                $arr = explode(",", $sorts);
                if ($sort && in_array($sort, $arr)) {
                    $link .= $url ? '<li class="clear"><div class="links-back"><div class="link-item-content"><a href="'.$url.'" target="_blank"><span class="title-img" style="background-image: url('.$img.');" alt="'.$name.'"/></span><span class="title-text">'.$name.'</span></div><span class="description-wrapper">'.$description.'</span></div></a></li>' : '<li class="clear"><div class="links-back"><div class="link-item-content"><a href="'.$url.'" target="_blank"><span class="title-img" style="background-image: url('.$img.');" alt="'.$name.'"/></span><span class="title-text">'.$name.'</span></div><span class="description-wrapper">'.$description.'</span></div></a></li>';
                }
            } else {
                $link .= $url ? '<li class="clear"><div class="links-back"><div class="link-item-content"><a href="'.$url.'" target="_blank"><span class="title-img" style="background-image: url('.$img.');" alt="'.$name.'"/></span><span class="title-text">'.$name.'</span></div><span class="description-wrapper">'.$description.'</span></div></a></li>' : '<li class="clear"><div class="links-back"><div class="link-item-content"><a href="'.$url.'" target="_blank"><span class="title-img" style="background-image: url('.$img.');" alt="'.$name.'"/></span><span class="title-text">'.$name.'</span></div><span class="description-wrapper">'.$description.'</span></div></a></li>';
            }
        }
    }
    echo $link ? $link : '<no>暂无链接</no>';
}

//页面加载时间
function timer_start() {
global $timestart;
$mtime = explode( ' ', microtime() );
$timestart = $mtime[1] + $mtime[0];
return true;
}
timer_start();
function timer_stop( $display = 0, $precision = 3 ) {
global $timestart, $timeend;
$mtime = explode( ' ', microtime() );
$timeend = $mtime[1] + $mtime[0];
$timetotal = number_format( $timeend - $timestart, $precision );
$r = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
if ( $display ) {
echo $r;
}
return $r;
}

//评论镶嵌
function themeInit($archive)
{
 Helper::options()->commentsMaxNestingLevels = 999;//评论回复楼侧最高999层.这个正常设置最高只有7层
 if ($archive->is('single')) {
    $archive->content = createCatalog($archive->content);
}
}

function compressHtml($html_source) {
	$chunks = preg_split('/(<!--<nocompress>-->.*?<!--<\/nocompress>-->|<nocompress>.*?<\/nocompress>|<pre.*?\/pre>|<textarea.*?\/textarea>|<script.*?\/script>)/msi', $html_source, -1, PREG_SPLIT_DELIM_CAPTURE);
	$compress = '';
	foreach ($chunks as $c) {
		if (strtolower(substr($c, 0, 19)) == '<!--<nocompress>-->') {
			$c = substr($c, 19, strlen($c) - 19 - 20);
			$compress .= $c;
			continue;
		} else if (strtolower(substr($c, 0, 12)) == '<nocompress>') {
			$c = substr($c, 12, strlen($c) - 12 - 13);
			$compress .= $c;
			continue;
		} else if (strtolower(substr($c, 0, 4)) == '<pre' || strtolower(substr($c, 0, 9)) == '<textarea') {
			$compress .= $c;
			continue;
		} else if (strtolower(substr($c, 0, 7)) == '<script' && strpos($c, '//') != false && (strpos($c, PHP_EOL) !== false || strpos($c, PHP_EOL) !== false)) {
			$tmps = preg_split('/(\r|\n)/ms', $c, -1, PREG_SPLIT_NO_EMPTY);
			$c = '';
			foreach ($tmps as $tmp) {
				if (strpos($tmp, '//') !== false) {
					if (substr(trim($tmp), 0, 2) == '//') {
						continue;
					}
					$chars = preg_split('//', $tmp, -1, PREG_SPLIT_NO_EMPTY);
					$is_quot = $is_apos = false;
					foreach ($chars as $key => $char) {
						if ($char == '"' && $chars[$key - 1] != '\\' && !$is_apos) {
							$is_quot = !$is_quot;
						} else if ($char == '\'' && $chars[$key - 1] != '\\' && !$is_quot) {
							$is_apos = !$is_apos;
						} else if ($char == '/' && $chars[$key + 1] == '/' && !$is_quot && !$is_apos) {
							$tmp = substr($tmp, 0, $key);
							break;
						}
					}
				}
				$c .= $tmp;
			}
		}
		$c = preg_replace('/[\\n\\r\\t]+/', ' ', $c);
		$c = preg_replace('/\\s{2,}/', ' ', $c);
		$c = preg_replace('/>\\s</', '> <', $c);
		$c = preg_replace('/\\/\\*.*?\\*\\//i', '', $c);
		$c = preg_replace('/<!--[^!]*-->/', '', $c);
		$compress .= $c;
	}
	return $compress;
}

function postThumb($obj) {
	$thumb = $obj->fields->thumb;
	if (!$thumb) {
		return false;
	}
	if (is_numeric($thumb)) {
		preg_match_all('/<img.*?src="(.*?)".*?[\/]?>/i', $obj->content, $matches);
		if (isset($matches[1][$thumb-1])) {
			$thumb = $matches[1][$thumb-1];
		} else {
			return false;
		}
	}
	if (Helper::options()->AttUrlReplace) {
		$thumb = UrlReplace($thumb);
	}
	return ''.$thumb.'';
}

function createCatalog($obj) {
	global $catalog;
	global $catalog_count;
	$catalog = array();
	$catalog_count = 0;
	$obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function($obj) {
		global $catalog;
		global $catalog_count;
		$catalog_count ++;
		$catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
		return '<h'.$obj[1].$obj[2].'><a class="cl-offset" name="cl-'.$catalog_count.'"></a>'.$obj[3].'</h'.$obj[1].'>';
	}, $obj);
	return $obj.PHP_EOL .getCatalog();
}

function getCatalog() {
	global $catalog;
	$index = '';
	if ($catalog) {
		$index = '<ul>'.PHP_EOL;
		$prev_depth = '';
		$to_depth = 0;
		foreach($catalog as $catalog_item) {
			$catalog_depth = $catalog_item['depth'];
			if ($prev_depth) {
				if ($catalog_depth == $prev_depth) {
					$index .= '</li>'.PHP_EOL;
				} elseif ($catalog_depth > $prev_depth) {
					$to_depth++;
					$index .= PHP_EOL .'<dl>'.PHP_EOL;
				} else {
					$to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
					if ($to_depth2) {
						for ($i=0; $i<$to_depth2; $i++) {
							$index .= '</li>'.PHP_EOL .'</dl>'.PHP_EOL;
							$to_depth--;
						}
					}
					$index .= '</li>'.PHP_EOL;
				}
			}
			$index .= '<li><a href="#cl-'.$catalog_item['count'].'" onclick="Catalogswith()">'.$catalog_item['text'].'</a>';
			$prev_depth = $catalog_item['depth'];
		}
		for ($i=0; $i<=$to_depth; $i++) {
			$index .= '</li>'.PHP_EOL .'</ul>'.PHP_EOL;
		}
	$index = '<div id="catalog-col">'.PHP_EOL .'<strong>[ 文章目录 ]</strong>'.PHP_EOL .$index.'<script>function Catalogswith(){document.getElementById("catalog-col").classList.toggle("catalog");document.getElementById("catalog").classList.toggle("catalog")}</script>'.PHP_EOL .'</div>'.PHP_EOL;
	}
	return $index;
}
