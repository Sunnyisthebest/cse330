<?php

require 'Dbm.php';
class Event
{
    public function _construct($user)
    {
        $this->user = $user;
        $db = new Database();
        $this->model = $db;
    }

    public function addEvent($subject, $date, $description)
    {
    }
    public function editEvent($subject, $date, $description)
    {
    }
    public function deleteEvent($subject, $date, $description)
    {
    }
    public function showEvent()
    {
    }
}
