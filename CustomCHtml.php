<?php

class CustomCHtml extends CHtml
{
	/**
	 * Generates an opening form tag.
	 * Note, only the open tag is generated. A close tag should be placed manually
	 * at the end of the form.
	 * @param mixed $action the form action URL (see {@link normalizeUrl} for details about this parameter.)
	 * @param string $method form method (e.g. post, get)
	 * @param array $htmlOptions additional HTML attributes (see {@link tag}).
	 * @return string the generated form tag.
	 * @see endForm
	 */
	public static function beginForm($action='',$method='post',$htmlOptions=array())
	{
		if($action != false)
			$htmlOptions['action']=$url=self::normalizeUrl($action);
			
		$htmlOptions['method']=$method;
		$form=self::tag('form',$htmlOptions,false,false);
		$hiddens=array();
		if(!strcasecmp($method,'get') && ($pos=strpos($url,'?'))!==false)
		{
			foreach(explode('&',substr($url,$pos+1)) as $pair)
			{
				if(($pos=strpos($pair,'='))!==false)
					$hiddens[]=self::hiddenField(urldecode(substr($pair,0,$pos)),urldecode(substr($pair,$pos+1)),array('id'=>false));
				else
					$hiddens[]=self::hiddenField(urldecode($pair),'',array('id'=>false));
			}
		}
		$request=Yii::app()->request;
		if($request->enableCsrfValidation && !strcasecmp($method,'post'))
			$hiddens[]=self::hiddenField($request->csrfTokenName,$request->getCsrfToken(),array('id'=>false));
		if($hiddens!==array())
			$form.="\n".self::tag('div',array('style'=>'display:none'),implode("\n",$hiddens));
		return $form;
	}
}
?>