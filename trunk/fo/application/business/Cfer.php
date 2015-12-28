<?php

class Cfer
{
	var $cfer;
	var $cferArray;
	function Cfer($args)
	{
		$CI =& get_instance();
		$CI->load->helper('utils');

		$this->cferArray = $args;
		$this->cfer = "";
		if (is_array($args))
		{
			$size = sizeof($args);
			for ($i = 0;$i < $size;$i++)
			{
				$label = key($args);
				$link = $args[$label];
				$glink = ($link != '') ? utf8_escape_html($link) : '#';
				$this->cfer.= "<a href='$glink'".(($i == $size-1)?" class=\"last\"":"").">$label</a>";
				if ($i+1 < $size) $this->cfer.= (($i == $size-2)?"<span class=\"last\">":"")."&nbsp;&gt;&nbsp;".(($i == $size-2)?"</span>":"");
				next($args);
			}
		}
	}

	function display()
	{
		return $this->cfer;
	}
	function getCferArray()
	{
		return $this->cferArray;
	}
}
