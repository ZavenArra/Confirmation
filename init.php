<?

Route::set('confirmation', 'confirmation/<id>')->defaults(array(
  'controller' => 'confirmation',
  'action'     => 'confirm',
));

