<?php

return [
    '/' => 'EventController@index',
    '/events/{id}' => 'EventController@details',
    '/admin' => 'AdminController@dashboard',
];
