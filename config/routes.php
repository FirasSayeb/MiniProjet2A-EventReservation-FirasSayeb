<?php

return [
    '/' => 'EventController@index',
    '/events/{id}' => 'EventController@details',
    '/events/{id}/reserve' => 'EventController@reserve',
    '/events/{id}/reussite' => 'EventController@reussite',
    '/admin' => 'AdminController@dashboard',
    '/admin/login' => 'AdminController@login',
    '/admin/reservations' => 'AdminController@reservations',
     '/admin/logout' => 'AdminController@logout',
];
