<?php
class Darbuotojas{
    public $name;
    public $surname;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): Darbuotojas
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): Darbuotojas
    {
        $this->surname = $surname;
        return $this;
    }


}


$j=(new Darbuotojas())->setName("Jonas")->setSurname("Petraitis")->setName("asd");
