<?php

class Home extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = $this->model('User');
    }

    public function index($name = '')
    {
        //$user = $this->model('User');
        $user = $this->user;
        $user->name = $name;

        //$this->view('Site/Home/index', ['title' => 'Home Page', 'name' => $user->name]);
        echo $this->twigView('Site', 'Home/home.html', FALSE, ['title' => 'Home page', 'textA' => 'Hello New World' ]);

        //echo $user->name;
        //echo 'home/index';
    }

    /**
     * @param string $username
     * @param string $email
     */
    public function create($username = '', $email = '')
    {
        $this->user->create([
            //User::create([
            'username' => $username,
            'email' => $email
        ]);

    }
}

?>