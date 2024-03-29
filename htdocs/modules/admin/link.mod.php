<?php
/**
 * 文件名：link.mod.php
 * 版本号：1.0
 * 最后修改时间：Tue Oct 30 13:16:22 CST 2007
 * 作者：pugo.in
 * 功能描述：友情链接模块管理
 */

if(!defined('IN_PUGOIN'))
{
    exit('invalid request');
}

class ModuleObject extends MasterObject
{

	var $Code = array();
	
	var $ID = 0;
	var $_config=array();
	var $configPath="";

	
	function ModuleObject($config)
	{
		$this->MasterObject($config);
		$this->ID = $this->Get['id']?(int)$this->Get['id']:(int)$this->Post['id'];
		$this->configPath = ROOT_PATH . 'setting';
		$this->Execute();
	}

	
	function Execute()
	{
		ob_start();
		switch($this->Code)
		{
			case 'modify':
				$this->Main();
				break;
			case 'domodify':
				$this->DoModify();
				break;
			default:
				$this->Main();
				break;
		}
		$body = ob_get_clean();
		
		$this->ShowBody($body);
		
	}
	
	
	function Main()
	{
		$this->Modify();
	}
	
	function Modify()
	{
	
		$link_list=array();
		$current_domain=preg_replace("~^www\.~i","",$_SERVER['HTTP_HOST']);
		//echo  'ddddddddddddddddddddddddddd'. $current_domain
		if(include($this->configPath.'/link.php'))
		{	
			$link_list=$config['link_list'];
		}
		include($this->TemplateHandler->Template('admin/link'));
	}
	
	function DoModify()
	{
		$link=$this->Post['link'];
		if($link['new']['name']!="" && $link['new']['url']!="" )
		{
			$new_link=$link['new'];
			
			$link[]=$new_link;
		}
		unset($link['new']);
		if($this->Post['delete'])
		{
			foreach ($this->Post['delete'] as $link_id)
			{
				unset($link[$link_id]);
			}
		}
		
				$n=100;
		$i=0;
		$link_list=array();
		foreach (@$link as $l)
		{			
			if(!empty($l['logo']))
			{
				$key = $i++;
			}
			else 
			{
				$key = $n++;
			}
			
			$l['order'] = (int) ($l['order'] ? $l['order'] : $key);
			
			$link_list[$key]=$l;
		}
				if($link_list) {
			foreach ($link_list as $k=>$n)
			{
				$order[$k]=$n['order'];
			}
			@array_multisort($order,SORT_ASC,$link_list);
		}
		
		
		$this->_saveConfig($link_list);
		$this->Messager("修改成功");
	}
	
	function _saveConfig($link)
	{
		$fp= @fopen($this->configPath.'/link.php',"wb");
		if(!$fp)
		$this->Messager("配置文件“{$this->configPath}link.php”无法写入，请检查文件是否有可写权限");
		$link=jaddslashes($link);
		fwrite($fp,"<?php\r\n\$config['link_list']=".var_export($link,true).";\r\n?>");
		fclose($fp);
		return true;
	}
}
?>
