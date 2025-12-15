<?php

class EventController
{
    public function index()
    {
        echo "<h1>MiniEvent Home Page ✅</h1>";
    }

    public function list()
    {
        echo "<h2>Event List</h2>";
    }

    public function details($id)
    {
        echo "<h2>Event ID: $id</h2>";
    }
}
