<?

Class Controller_ConfirmationExample extends Controller {

  public function action_sendExample($email='deepwinter@winterroot.net'){
    $confirmation = new Confirmation('example', $email, 'confirmationexample', 'confirm', array('id') );
    echo $confirmation->createMessageBody();
    die();
    $confirmation->send();
    echo 'Example Sent';
  }

  public function action_confirm($id){
    $this->response->body("You've been confirmed, thanks for using the example controller");
  }
}
