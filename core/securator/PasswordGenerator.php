<?php namespace core\securator;
/**
 *
 */
class PasswordGenerator
{

  const SOURCE_SUFFIX = 'src';

  const ESPECIAL_CHARS = '\`¬|!"£$%^&*()_-+={}[]:@~;\'#<>?,./|\\';

  protected $algorithm;
  protected $sourcelist;
  protected $word;
  protected $list;


  function __construct()
  {

  }


  public function digits($max=999){

    return random_int(1,$max);
  }

  public function specials(){

    $maxSpecials = strlen(self::ESPECIAL_CHARS)-1;

    return self::ESPECIAL_CHARS[random_int(0,$maxSpecials)];
  }

  public function precessSource($wordSource, $minWordLegth, $cacheDir){

    foreach ($wordSource as $html) {
      $haskey=md5($html);
      $sourceFile = $cacheDir.'/'.$hasKey.'.'. self::SOURCE_SUFFIX;

      $this->sourceList[]= $sourceFile;

      if(!file_exists($srouceFile) || filesize($sourceFile)==0){

        echo 'Processing: '.$html.PHP_EOL;

        $contents = file_get_contents($html);

        if(preg_match('/<body>(.*)<\/body>/i', $contents,$matches)){
          $contents = $matches[1];
        }
        $list = str_word_count(strip_tags($contents),1);

        foreach ($list as $key => $value) {
          if(strlen($value)<$minWordLegth){
            $list[$key]='xxxxxx';

          }else{
            $list[$key] = trim($value);
          }
        }
        $list = array_unique($list);
        file_put_contents($sourceFile, implode("\n",$list));
      }

    }

    return TRUE;
  }

}
 ?>
