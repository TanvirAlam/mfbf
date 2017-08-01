<?php

namespace Tests\Features;

use App\Models\Budget;
use App\Models\Category;
use App\Models\User;
use Tests\BrowserKitTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateUserTest extends BrowserKitTestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    /**
     * A user see login page
     *
     * @return void
     */
    public function testIfUserCanLoginPage()
    {
        $this->get('/login')->assertResponseOk();
    }

    /**
     * A user can register
     *
     * @return void
     */
    public function testIfUserCanRegister()
    {

    }

    /**
     * A test if user can login and see dashboard
     *
     * @return void
     */
    public function testIfUserCanLoginSeeDashboard()
    {

    }

    /**
     * A user is authenticated
     *
     * @return void
     */
    public function testIfUserAuthentication()
    {

    }

    /**
     * A user can reset password
     *
     * @return void
     */
    public function testIfUserCanResetPassword()
    {

    }

    /**
     * A user can edit their profile
     *
     * @return void
     */
    public function testIfUserCanEditProfile()
    {

    }
}