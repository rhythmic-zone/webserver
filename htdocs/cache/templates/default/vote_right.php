<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><!--右边栏目 Begin-->
<div class="Hotright">
<?php if(MEMBER_ID) { ?>
		<div class="HboxR">
<?php if($this->Code != 'view') { ?>
				<div class="boxRimg" style="margin:10px 0">
				<div class="boxRimg_img">
					<a href="index.php?mod=<?php echo $member['username']; ?>" title="<?php echo $member['username']; ?>"><img onerror="javascript:faceError(this);" src="<?php echo $member['face']; ?>" title="<?php echo $member['nickname']; ?>" /></a>
				</div>
				<div class="boxRimg_txt">
				<p><span class="spanimg"><?php echo $member['nickname']; ?> <?php echo $member['validate_html']; ?></span>
<?php if($member['gender'] == 1) { ?>
							<img src="templates/default/images/user.gif"  title="<?php echo $member['nickname']; ?>" style="width:15px; height:15px; margin:0;"/><?php } elseif($member['gender'] == 2) { ?><img src="templates/default/images/user_female.gif"  title="<?php echo $member['nickname']; ?>" style="width:15px; height:15px; margin:0"/>
						
<?php } ?>
</p>
				<p>

						<span><?php echo $member['province']; ?>&nbsp;<?php echo $member['city']; ?></span>
				</p>
				<p><a href="index.php?mod=<?php echo $member['username']; ?>" title="<?php echo $member['username']; ?>">我的微博</a></p>
				</div>
				</div>
			
<?php } ?>
<div style="height:36px; width:138px; margin-top:15px; float:left">
				<a href="index.php?mod=vote&code=create"><img src="templates/default/images/vote/vote_bg.png" /></a>
			</div>
		</div>
<?php } else { ?><div class="HboxR">
			<span>还没有微博客帐号？<a href="index.php?mod=member">注册</a></span>
			<br />
			<span>已有帐号，<a href="index.php?mod=login">请点此登录</a></span>
		</div>
	
<?php } ?>
<!--投票菜单 Begin-->
<?php if($this->Code=='view') { ?>
		<div class="HboxR">
			<div class="vote_line"></div>
				<ul class="vote_r_nav">
					<li><a href="index.php?mod=vote">投票首页</a></li>
<?php if(MEMBER_ID>0) { ?>
						<li><a href="index.php?mod=vote&view=me">我的投票</a></li>
						<li class="no_line"><a href="index.php?mod=vote&view=fllow">我关注的人的投票</a></li>
					
<?php } ?>
</ul>
		</div>
	
<?php } ?>
 
	<!--投票菜单 End-->
	  
	<!--热点推荐 Begin-->
	<div class="HboxR">
		<div class="vote_line">热点推荐</div>
			<ul>
<?php if(is_array($recd_list)) { foreach($recd_list as $val) { ?>
				<li>
					<span class="boxRl listyle"><a href="index.php?mod=vote&code=view&vid=<?php echo $val['vid']; ?>"><?php echo $val['subject']; ?></a></span>
					<span style="float:right;">(共<?php echo $val['voter_num']; ?>票)</span>
				</li>
			
<?php } } ?>
</ul>
		</div>
	<!--热点推荐 End-->
	
	<!--投票达人 Begin-->
	
	<div class="HboxR">
		<div class="vote_line">投票达人</div>
		<div id="vote_daren_wp"></div>
	</div>
	<script language="javascript">
		getVoteDaRen('vote_daren_wp');
	</script>
	
	<!--投票达人 End-->
	
	<div class="HboxR">
<?php if($this->Config['ad_enable']) { ?>
			<div class="R_AD">
			 <?php echo $this->Config['ad']['ad_list']['vote']['middle_right']; ?>
			</div>
		
<?php } ?>
</div>
</div>
</div>
</div>