<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script>
<?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?>
<?php if(('mycomment'==$this->Code || $topic_view) && 'reply'==$val['type'] && $tpid!=($pid=$val['parent_id']) && $parent_list[$pid]) { ?>
<p class="feedP">回复{<a href="index.php?mod=<?php echo $parent_list[$pid]['username']; ?>"><?php echo $parent_list[$pid]['nickname']; ?>：</a><span><?php echo $parent_list[$pid]['content']; ?></span>}</p>
<?php } ?>

<?php if(!$topic_view) { ?>
<?php $pt=$parent_list[$tpid]; ?>
<div class="blogTxt">
  <div class="top"></div>
  <div class="mid">
    
<?php if($pt) { ?>
		<span>
        <a href="index.php?mod=<?php echo $pt['username']; ?>" onmouseover="get_user_choose(<?php echo $pt['uid']; ?>,'_reply_user',<?php echo $pt['tid']; ?>);" onmouseout="clear_user_choose();">
       	 	<?php echo $pt['nickname']; ?>
		</a>
        <?php echo $pt['validate_html']; ?> :  
        	<!--悬浮头像、弹出对话框-->
            <span id="user_<?php echo $pt['tid']; ?>_reply_user"></span>
            <!--悬浮头像、弹出对话框-->	
        </span>
<?php $TPT_ = $TPT_ ? $TPT_ : 'TPT_'; ?>
<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_short"><?php echo $pt['content']; ?></span>
		<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_full"></span>
<?php if($pt['longtextid'] > 0) { ?>
			<span>
			<a href="javascript:;" onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', this, '<?php echo $TPT_; ?>');return false;">查看全文</a>
			</span>
		
<?php } ?>

<?php if($pt['imageid'] && $pt['image_list']) { ?>
<?php $pt['image_key']=$pt['tid'].'_'.random(6); ?>
<ul class="imgList" id="image_area_<?php echo $pt['image_key']; ?>">
			  
<?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?>
			  <li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll" rel="<?php echo $iv['image_small']; ?>" topicId="<?php echo $pt['tid']; ?>" rev="<?php echo $pt['image_key']; ?>" shoppingUrl="<?php echo $pt['ShoppingUrl']; ?>" shoppingPrice="<?php echo $pt['ShoppingPrice']; ?>" shoppingTypeLogo="<?php echo $pt['ShoppingTypeLogo']; ?>"><img style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;" src="<?php echo $iv['image_small']; ?>" /></a></li>
			  
<?php } } ?>
</ul>
		
<?php } ?>
<!--投票 Begin-->
<?php if($pt['is_vote'] > 0) { ?>
<?php $__vote_key = $pt['tid'].'_'.$pt['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $__vote_key; ?>">
				  <li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $__vote_key; ?>', <?php echo $pt['is_vote']; ?>);"><img src='./images/vote_pic_01.gif'/></a> </li>
				</ul>
				<div id="vote_area_<?php echo $__vote_key; ?>" style="display:none;">

						<div class="vote_zf_box" id="vote_content_<?php echo $__vote_key; ?>"></div> 

				</div>
			
<?php } ?>
              
		<!--投票 End-->
<?php if($pt['videoid'] and $this->Config['video_status']) { ?>
		<div class="feedUservideo"><a onClick="javascript:showFlash('<?php echo $pt['VideoHosts']; ?>', '<?php echo $pt['VideoLink']; ?>', this, '<?php echo $pt['VideoID']; ?>','<?php echo $pt['VideoUrl']; ?>');" >
		  <div id="play_<?php echo $pt['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif"  /></div>
		  <img src="<?php echo $pt['VideoImg']; ?>" style="border:none"/> </a></div>
		
<?php } ?>

<?php if($pt['musicid']) { ?>
		<div class="feedUserImg"><div id="play_<?php echo $pt['MusicID']; ?>"></div><img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $pt['MusicUrl']; ?>', this, '<?php echo $pt['MusicID']; ?>');" style="cursor:pointer; border:none;" /> </div>
		
<?php } ?>
    
	    
		<div>
		<a href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">原文评论(<?php echo $pt['replys']; ?>)</a>&nbsp;
		<a onclick="get_forward_choose(<?php echo $tpid; ?>);return false;" href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">转发原文(<?php echo $pt['forwards']; ?>)</a>&nbsp;	
		<?php echo $pt['from_html']; ?>
		</div>
    
<?php } else { ?><?php $val['reply_disable']=0; ?>
<p><span>原始微博已删除</span></p>
    
<?php } ?>
  </div>
  <div class="bottom"></div>
</div>
<?php } ?>
<?php } ?>