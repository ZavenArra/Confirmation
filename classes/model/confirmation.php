<?

Class Model_Confirmation extends ORM{

  

  public function save(Validation $validation = NULL){
    if(!$this->loaded()){
      //we are inserting
      $this->confirmation_id = $this->rand_str();
    }
    parent::save($validation);
  }

  // Generate a random character string
  private static function rand_str($length = 32, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890')
  {
    // Length of character list
    $chars_length = (strlen($chars) - 1);

    // Start our string
    $string = $chars{rand(0, $chars_length)};

    // Generate random string
    for ($i = 1; $i < $length; $i = strlen($string))
    {
      // Grab a random character from our list
      $r = $chars{rand(0, $chars_length)};

      // Make sure the same two characters don't appear next to each other
      if ($r != $string{$i - 1}) $string .=  $r;
    }

    // Return the string
    return $string;
  }

}
