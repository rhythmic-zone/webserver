<?php /* 2015-07-27 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>
<?php if(is_array($group_list)) { foreach($group_list as $group) { ?>
<dl class="ml_dl" id="del_group_ajax_<?php echo $group['id']; ?>">
<dd>
<?php if($touid) { ?>
<input id="select_<?php echo $val['uid']; ?>_<?php echo $group['id']; ?>" name="group" type="checkbox" onclick="groupState(<?php echo $group['id']; ?>,'<?php echo $touid; ?>',this);return false;"/>
<?php } ?>
<?php if($this->Code == 'follow') $urlcode = 'follow'; else $urlcode = 'myhome'; ?>
 
<a href="index.php?mod=topic&code=<?php echo $urlcode; ?>&gid=<?php echo $group['id']; ?>" title="成员人数：<?php echo $group['group_count']; ?>"><?php echo $group['group_name']; ?></a> 
</dd>
<dt>(<?php echo $group['group_count']; ?>)<a onclick="del_group('<?php echo $group['id']; ?>','<?php echo $touid; ?>');return false;" href="javascript:;" title="删除分组" style="float:none;">×</a></dt>
</dl>
<?php } } ?>