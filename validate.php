<?php
class validation
{
    private $inputstring;
    private $minlenght;
    private $maxlenght;
    private $alphabetsaccepted;
    private $numberaccepted;
    protected $error = "";
    private $stringlenght;
    private $specialcharaccepted;
    
    public function __construct($inputstring, $minlenght, $maxlenght, $numberaccepted, $alphabetsaccepted, $specialcharaccepted)
    {
        $this->inputstring         = $inputstring;
        $this->minlenght           = $minlenght;
        $this->maxlenght           = $maxlenght;
        $this->alphabetsaccepted   = $alphabetsaccepted;
        $this->numberaccepted      = $numberaccepted;
        $this->stringlenght        = strlen(trim($this->inputstring));
        $this->specialcharaccepted = $specialcharaccepted;
    }
    protected function validatemaxlenght()
    {
        ($this->stringlenght > $this->maxlenght) ? $this->error = "maximum lenght is" . $this->maxlenght : "";
    }
    protected function validateminlenght()
    {
        
        ($this->stringlenght < $this->minlenght) ? $this->error = "minimum lenght is" . $this->minlenght : "";
    }
    protected function chechkalphabets()
    {
        ($this->numberaccepted) ? "" : (preg_match('~[0-9]~', $this->inputstring)) ? $this->error = "wrong format numbers not accepted" : "";
    }
    protected function chechknumbers()
    {
        (!$this->alphabetsaccepted) ? (preg_match("/[a-z]/i", $this->inputstring)) ? $this->error = "wrong format alpabets not accepted" : "" : "";
    }
    protected function checkspecialcharaters()
    {
        (!$this->specialcharaccepted) ? (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $this->inputstring)) ? $this->error = "wrong format specialcharacters  not accepted" : "" : "";
    }
    function validate()
    {
        $this->validatemaxlenght();
        echo $this->error;
        $this->validateminlenght();
        echo $this->error;
        $this->chechkalphabets();
        $this->chechknumbers();
        $this->checkspecialcharaters();
        return "*" . $this->error;
    }
    
    
}

?>