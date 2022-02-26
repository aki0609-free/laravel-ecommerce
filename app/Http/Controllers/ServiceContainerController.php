<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceContainerController extends Controller
{


    public function showServiceContainerTest()
    {
        app()->bind('lifeCycleTest', function () {
            return 'LifeCycleTest';
        });

        $test = app()->make('lifeCycleTest');

        //No ServiceContainer
        $message = new Message();
        $sample = new Sample($message);
        $sample->run();

        //Use ServiceContainer
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample');
        $sample->run();

        dd($test, app());
    }

    public function showServiceProviderTest()
    {
        $encrypt = app()->make('encrypter');
        $password = $encrypt->encrypt('password');

        $sample = app()->make('serviceProviderTest');


        dd($sample, $password, $encrypt->decrypt($password));
    }
}

class Message
{
    public function send()
    {
        echo ('show message');
    }
}

class Sample
{
    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function run()
    {
        $this->message->send();
    }
}
