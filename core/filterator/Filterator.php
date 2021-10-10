<?php namespace core\filterator;
 /**
 *
 */
}
class Filterator
{

  protected $filters;
  protected $assignmets;

  function __construct()
  {
    $this->filters= [
      'trim' => function ($item) { return trim($item); },
      'float' => function ($item) { return (float) $item; },
      'upper' => function ($item) { return strtoupper($item); },
      'email' => function ($item) { return filter_var($item, FILTER_SANITIZE_EMAIL); },
      'alpha' => function ($item) { return preg_replace('/[^A-Za-z]/', '', $item); },
      'alnum' => function ($item) { return preg_replace('/[^0-9A-Za-z ]/', '', $item); },
      'length' => function ($item, $length) {return substr($item, 0, $length); },
      'stripTags' => function ($item) { return strip_tags($item); },

    ];

  }


  public function addAssignment($key, $filters=array()){
    if(is_array($filters)){
      foreach ($filters as $k => $value) {
        if(!array_key_exists($k,$this->filters)){
          throw new \Exception("$k is noa valid filter function", 1);
          break;
        }
      }

      $this->assignmets[$key]=$filters;
    }
  }


  public function filterData($data){

    foreach ($data as $field => $item) {
      if(isset($this->assignmets['*']))
      foreach ($this->assignments['*'] as $key => $option) {
        $item = $this->filters[$key]($item, $option);
      }

      foreach ($this->assignments[$field] as $key => $option) {
        $item = $this->filters[$key]($item, $option);
      }
    }
  }

  public function customFilter($key,$function){

    $this->filters[$key] =$function;
  }

  public function getValFunctionAllowed(){

    return $this->validator;
  }

}
 ?>
