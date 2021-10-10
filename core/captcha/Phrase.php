<?php namespace core\captcha;

/**
 *
 */
class Phrase
{
  const DEFAULT_LENGTH   = 6;
  const DEFAULT_NUMBERS  = '0123456789';
  const DEFAULT_UPPER    = 'ABCDEFGHJKLMNOPQRSTUVWXYZ';
  const DEFAULT_LOWER    = 'abcdefghijklmnopqrstuvwxyz';
  const DEFAULT_SPECIAL  =     '¬\`|!"£$%^&*()_-+={}[]:;@\'~#<,>.?/|\\';
  const DEFAULT_SUPPRESS = ['O','l'];

  protected $phrase;
  protected $includeNumbers;
  protected $includeUpper;
  protected $includeLower;
  protected $includeSpecial;
  protected $otherChars;
  protected $suppressChars;
  protected $string;  protected $length;


  public function __construct($length = NULL,$includeNumbers = TRUE,
                              $includeUpper= TRUE,$includeLower= TRUE,
                              $includeSpecial = FALSE,$otherChars = NULL,
                              array $suppressChars = NULL){

        $this->length = $length ?? self::DEFAULT_LENGTH;
        $this->includeNumbers = $includeNumbers;
        $this->includeUpper = $includeUpper;
        $this->includeLower = $includeLower;
        $this->includeSpecial = $includeSpecial;
        $this->otherChars = $otherChars;
        $this->suppressChars = $suppressChars       ?? self::DEFAULT_SUPPRESS;
        $this->phrase = $this->generatePhrase();

      }

  public function getString(){  return $this->string;}

  public function setString($string){  $this->string = $string;}

  public function initString(){
    $string = '';
    if ($this->includeNumbers) {
      $string .= self::DEFAULT_NUMBERS;
    }

    if ($this->includeUpper) {
      $string .= self::DEFAULT_UPPER;
    }

    if ($this->includeLower) {
      $string .= self::DEFAULT_LOWER;
    }

    if ($this->includeSpecial) {
      $string .= self::DEFAULT_SPECIAL;
    }

    if ($this->otherChars) {
      $string .= $this->otherChars;
    }

    if ($this->suppressChars) {
      $string = str_replace(        $this->suppressChars, '', $string);
    }

    return $string;
  }


  public function generatePhrase(){

    $phrase = '';
    $this->string = $this->initString();
    $max = strlen($this->string) - 1;

    for ($x = 0; $x < $this->length; $x++) {
      $phrase .= substr(      $this->string, random_int(0, $max), 1);
     }

     return $phrase;
   }

   public function getPhrase(){
     return $this->phrase;
   }
}
 ?>
