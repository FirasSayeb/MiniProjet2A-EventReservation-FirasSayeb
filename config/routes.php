<?php

return [
    '/' => 'EventController@index',
    '/events' => 'EventController@list',
    '/events/{id}' => 'EventController@details',
    '/admin' => 'AdminController@dashboard',
];
