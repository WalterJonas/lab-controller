<?php

class Input
{
	private $lab;
	private $name;
	private $hour;
	private $date;

    public function getLab()
    {
        return $this->lab;
    }
    public function setLab($lab)
    {
         $this->lab = filter_var($lab, FILTER_SANITIZE_STRIPPED);
    }

	public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
         $this->name = filter_var($name, FILTER_SANITIZE_STRIPPED);
    }

	public function getHour()
    {
        return $this->hour;
    }
    public function setHour($hour)
    {
         $this->hour = filter_var($hour, FILTER_SANITIZE_STRIPPED);
    }

	public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
         $this->date = filter_var($date, FILTER_SANITIZE_STRIPPED);
    }
}
