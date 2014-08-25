<?php

class ExampleTest extends TestCase {

    public function testHomePageRedirection()
    {
        $this->call('GET', '/');
        $this->assertRedirectedTo('schedules');
    }

    public function testVisitorIsRedirected()
    {
        $this->app['router']->enableFilters();
        $this->call('GET', '/schedules/create');
        $this->assertRedirectedTo('login');
    }

    public function tesLoggedInUserCanCreateSchedule()
    {
        $this->app['router']->enableFilters();
        $user = new User(array(
            'name'     => 'John Doe',
            'is_admin' => false
        ));
        $this->be($user);
        $this->call('GET', 'schedules/create');
        $this->assertResponseOk();
    }

    public function testAdminCanEditSchedule()
    {
        $user = new User(array(
            'id' => 3,
            'name' => 'Admin',
            'is_admin' => true
        ));
        $this->be($user);
        $new_class_type = 'Sub';
        $this->call('PUT', '/schedules/1', array('class_type' => $new_class_type));
        $crawler = $this->client->request('GET', )
    }
}
