<?php
namespace formBuilder;
 
use \fram\FormBuilder;
use \fram\StringField;
use \fram\TextField;
use \fram\MaxLengthValidator;
use \fram\NotNullValidator;
 
class PrefaceFormBuilder extends FormBuilder
{
  public function build()
  {
    $this->form->add(new StringField([
        'label' => 'Auteur',
        'name' => 'auteur',
        'maxLength' => 20,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">L\'auteur spécifié est trop long (20 caractères maximum)</div>', 20),
          new NotNullValidator('Merci de spécifier l\'auteur de la préface'),
        ],
       ]))
       ->add(new StringField([
        'label' => 'Titre',
        'name' => 'titre',
        'maxLength' => 100,
        'validators' => [
          new MaxLengthValidator('<div class="alert alert-danger" role="alert">Le titre spécifié est trop long (100 caractères maximum)</div>', 100),
          new NotNullValidator('Merci de spécifier le titre de la préface'),
        ],
       ]))
       ->add(new TextField([
        'label' => 'Contenu',
        'name' => 'contenu',
        'validators' => [
          new NotNullValidator('<div class="alert alert-danger" role="alert">Merci de spécifier le contenu de la préface</div>'),
        ],
       ]));
  }
}