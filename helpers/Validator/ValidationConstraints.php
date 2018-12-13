<?php

namespace Helper\Validator;

/**
 * ValidationConstraints Trait
 */
trait ValidationConstraints
{
  
  public $result;

  // Control if data is an url
  private function url()
  {
    if (filter_var($data, FILTER_VALIDATE_URL)) {
      return true;
    }else {
      return $data . ' is not a valid url';
    }
  }

  // Control if parameter is an email
  private function email($data)
  {

     if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
       return true;
     }else {
       return $data . ' is not a valid email';
     }

  }

  // Control if params is string
  private function text($data)
  {
     if (!filter_var($data, FILTER_VALIDATE_INT)) {
       return true;
     }else {
       return $data . ' is not a string';
     }

  }

  // Control if parameter is integer
  private function integer($data)
  {
     if (filter_var($data, FILTER_VALIDATE_INT)) {
       return true;
     }else {
       return $data . ' is not an integer';
     }
  }

  // Control if parameter isn't empty
  private function required($data)
  {
     if (!empty($data)) {
       return true;
     }else {
       return 'This field is required';
     }
  } 

  // Control if parameter is a valid boolean
  private function boolean($data)
  {
    if (filter_var($data, FILTER_VALIDATE_BOOLEAN)) {
      return true;
    }else {
      return $data . ' is not a valid boolean';
    }
  }


}
