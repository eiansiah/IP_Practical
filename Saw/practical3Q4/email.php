<?php

// Reference: https://refactoring.guru/design-patterns/decorator/php/example

interface IEmail
{
    public function getContent();
}

class Email implements IEmail
{
    private $to;
    private $from;
    private $message;

    public function getTo(){
		return $this->to;
	}

	public function setTo($to){
		$this->to = $to;
	}

	public function getFrom(){
		return $this->from;
	}

	public function setFrom($from){
		$this->from = $from;
	}

	public function getMessage(){
		return $this->message;
	}

	public function setMessage($message){
		$this->message = $message;
	}

    public function getContent(){
        $content = "To: $this->to <br>"."From: $this->from <br><br>"."Message: <br>$this->message";

        return $content;
    }
}

class EmailDecorator implements IEmail
{
    protected $emailComponent;

    public function __construct(IEmail $emailComponent){
        $this->emailComponent = $emailComponent;
    }

    public function getContent(){
        return $this->emailComponent->getContent();
    }
}

class Disclaimer extends EmailDecorator
{
    private $disclaimerText = "Disclaimer: \nThis is an email from XXX company.";

    public function getContent(){
        $content = parent::getContent();

        return $content."<br><br>".$this->disclaimerText;
    }
}

class Encryption extends EmailDecorator
{
    // References: https://stackoverflow.com/questions/46837349/data-encryption-decryption-for-php-7-1-and-higher

    private $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';

    public function encrypt($content){
        $encryption_key = base64_decode($this->key);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted = openssl_encrypt($content, 'aes-256-cbc', $encryption_key, 0, 
        $iv);
        return base64_encode($encrypted . '::' . $iv);
    }

    public function decrypt($content) {
        $encryption_key = base64_decode($this->key);
        list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($content), 
        2),2,null);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, 
        $iv);
    }

    public function getContent(){
        $content = parent::getContent();

        return $this->encrypt($content);
    }
}
?>