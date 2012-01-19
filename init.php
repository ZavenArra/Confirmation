<?

Route::set('confirmation', 'confirm/<id>')->defaults(array(
  'controller' => 'confirmation',
  'action'     => 'process',
));

