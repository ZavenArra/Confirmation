<?

Class Controller_Confirmation extends Controller {

  public function action_process($confirmation_id){
    $confirmed = confirmation::process($confirmation_id);

    if($confirmed){
      $this->response->body($confirmed);
    } else {
      $view = new View('failedConfirmation');
      $this->response->body($view->render());
    }

  }
}
