<?php
/*
 * YII FORM WITHOUT ACTION ATTRIBUTE
 * Extend Yii's CActiveForm and CHtml classes to enable the creation of a form tag with the action attribute omitted.
 * Developed for Yii 1.1.x
 *
 * @author: Peter Hartree <web@peterhartree.co.uk>
 * @author-uri: web.peterhartree.co.uk
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class CActiveFormSelf extends CActiveForm
{
	public function init()
	{
		if(!isset($this->htmlOptions['id']))
			$this->htmlOptions['id']=$this->id;
		else
			$this->id=$this->htmlOptions['id'];

		if($this->stateful)
			echo CHtml::statefulForm($this->action, $this->method, $this->htmlOptions);
		else
			echo CustomCHtml::beginForm($this->action, $this->method, $this->htmlOptions);

		if($this->errorMessageCssClass===null)
			$this->errorMessageCssClass=CHtml::$errorMessageCss;
	}
}