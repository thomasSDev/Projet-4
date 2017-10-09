<?php
namespace formBuilder;
 
use \fram\FormBuilder;
use \fram\StringField;
use \fram\TextField;
use \fram\MaxLengthValidator;
use \fram\NotNullValidator;
 
class UserFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'pseudo',
        'name' => 'pseudo',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('Le pseudo spécifié est trop long (50 caractères maximum)', 50),
          new NotNullValidator('Merci de spécifier le pseudo'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Passe',
        'name' => 'passe',
        'rows' => 7,
        'cols' => 50,
        'validators' => [
          new NotNullValidator('Merci de spécifier votre commentaire'),
        ],
       ]));
  }
}