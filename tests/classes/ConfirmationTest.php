<?

require_once 'PHPUnit/Framework.php';
Class ConfirmationTest extends PHPUnit_Framework_TestCase
  {
    public function setUp(){
      $_SERVER['SERVER_NAME'] = 'www.test.com';
    }

    public function testConstructConfirmation(){
      $confirmation = new Confirmation('createUser', 'test@test.com', 'controller', 'action', array('id', 'id2')); 
      $this->assertNotNull($confirmation);
      return $confirmation;
    }

    /**
     * @depends testConstructConfirmation
     */
    public function testCreateMessageSubject($confirmation){
      $subject = $confirmation->createMessageSubject();
      $this->assertNotNull($subject);
    }

    /**
     * @depends testConstructConfirmation
     */
    public function testCreateMessageBody($confirmation){
      $body = $confirmation->createMessageBody();
      $this->assertNotNull($body);

    }
  }

