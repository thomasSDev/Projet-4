<?php
namespace formBuilder;
 
use \fram\FormBuilder;
use \fram\StringField;
use \fram\TextField;
use \fram\MaxLengthValidator;
use \fram\NotNullValidator;
 
class CommentFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'pseudo',
        'name' => 'pseudo',
        'maxLength' => 50,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">L\'auteur spécifié est trop long (50 caractères maximum)</div>', 50),
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier l\'auteur du commentaire</div>'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Contenu',
        'name' => 'contenu',
        'rows' => 7,
        'cols' => 50,
        'validators' => [
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier votre commentaire</div>'),
        ],
       ]));
  }
}