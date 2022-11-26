<?php
class errorcollection{
    private $errors = array();
    public function addError($errorMessage){
        array_push($this->errors, $errorMessage);

    }

    public function getErrors(){
        return $this->errors;
    }

    public function hasErorrs(){
        return count($this->errors) === 0;
    }
}
?>