YII FORM WITHOUT ACTION ATTRIBUTE
=================================
 * @author: Peter Hartree <web@peterhartree.co.uk>
 * @author-uri: web.peterhartree.co.uk


 Extend Yii's CActiveForm and CHtml classes to enable the creation of a form tag with the action attribute omitted. Developed for Yii 1.1.x


Install
=================================
 1. Place the class files in your /protected/components directory.
 2. Check your /protected/config/main.php file, to ensure that the "import" array includes an entry to autoload these classes. (Hint: something like 'application.components.*',)
 
Usage
=================================

 1. In your view, call:
 
 $form=$this->beginWidget('CActiveFormSelf', array(
  // params
 );
 
 (where you would have called CActiveForm).
