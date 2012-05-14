<?

Class Confirmation {

  private $type = NULL;
  private $model = NULL;

  private $controller;
  private $action;
  private $arguments;

  /*
   * Sends an email with a link that calls controller/action/arguments when the confirmation is accepts
   */
  public function __construct($type, $email, $controller, $action, array $arguments=NULL){
    $this->type = $type;
    $this->email = $email;
    $this->controller = $controller;
    $this->action = $action;
    $this->arguments = $arguments;

    $this->model= $this->createConfirmationModel(); 
  }

  public function send(){
    $sender =  i18n::get('confirmation.'.$this->type.'.sender');
    $headers   = array();
    $headers[] = "From: $sender";
    mail($this->email, $this->createMessageSubject(), $this->createMessageBody(), $headers);
  }

  public function createMessageBody(){
    $body = i18n::get('confirmation.'.$this->type.'.body');
    $confirmationLink = url::base('http').'confirmation/'.$this->model->confirmation_id;
    return str_replace(':confirmationLink', $confirmationLink, $body);
  }

  public function createMessageSubject(){
    return i18n::get('confirmation.'.$this->type.'.subject');
  }

  public static function confirm($confirmation_id){
    $confirmation = ORM::Factory('confirmation')
      ->where('confirmation_id','=', $confirmation_id)
      ->find();
    if(!$confirmation->loaded() || $confirmation->confirmed){
      return false;
    } else {
      $body = self::doRoute($confirmation);
      $confirmation->confirmed=1;
      $confirmation->save();
      return $body;
    }
  }

  private static function doRoute($confirmation){
    $route = $confirmation->controller.'/'.$confirmation->action;
    if($confirmation->arguments){
      $arguments = json_decode($confirmation->arguments);
      foreach($arguments as $arg){
        $route .= '/'.$arg;
      }
    }
    $request = Request::Factory($route);
    $body = $request->execute()->body();
    return $body;

  }

  private function createConfirmationModel(){
    $confirmation = ORM::Factory('confirmation');
    $confirmation->email = $this->email;
    $confirmation->controller = $this->controller;
    $confirmation->action = $this->action;
    if($this->arguments){
      $confirmation->arguments = json_encode($this->arguments);
    }
    $confirmation->save();
    return $confirmation;
  }

}
