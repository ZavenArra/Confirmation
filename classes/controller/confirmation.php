<?

Class Controller_Confirmation extends Controller {

  public function action_confirm($confirmation_id){
    $confirmed = confirmation::confirm($confirmation_id);

    if($confirmed){
      $this->response->body($confirmed);
    } else {
      $view = new View('failedConfirmation');
      $this->response->body($view->render());
    }

  }
}
