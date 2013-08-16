Yii Form Without Action Attribute
=================================

 Extend Yii's CActiveForm and CHtml classes to enable the creation of a form tag with the action attribute omitted. **Developed for Yii 1.1.x.**


Install
--
 1. Put CustomCHtml.php and CActiveFormSelf.php in your /protected/components directory.
 2. Check your app config (/protected/config/main.php), to ensure that the "import" array includes a path to these classes. (Hint: something like 'application.components.*',)
 
Usage
--

 1. In your view, call:
 
```php
 $form=$this->beginWidget('CActiveFormSelf', array(
   'action' => false,
   // other params
 ));
 ```
