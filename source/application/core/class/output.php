<?php
class output
{
	public function showPage($content)
	{
		$template = new view("ZSM/index.phtml");
		$template->main = $content;
		echo $template;
	}


}