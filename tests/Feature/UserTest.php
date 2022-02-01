<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category()
    {
        $response = $this->get('/category');

        $response->assertStatus(200);
    }

    public function test_showCategory()
    {
        $response = $this->get('/category/1');

        $response->assertStatus(200);
    }

    public function test_showCategoryNews()
    {
        $response = $this->get('/category/1/news/1');

        $response->assertStatus(200);
    }

    public function test_showCategory_ErrorCategory()
    {
        $response = $this->get('/category/ghhn');

        $response->assertStatus(404);
    }

    public function test_showCategoryNews_ErrorNews()
    {
        $response = $this->get('/category/1/news/fgfdg');

        $response->assertStatus(404);
    }

    public function test_admin()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    public function test_adminCategory()
    {
        $response = $this->get('/admin/category');

        $response->assertStatus(200);
    }

    public function test_adminNews()
    {
        $response = $this->get('/admin/news');

        $response->assertStatus(200);
    }

    public function test_formsFeedback()
    {
        $response = $this->get('/forms/feedback');

        $response->assertStatus(200);
    }

    public function test_formsOrder()
    {
        $response = $this->get('/forms/order');

        $response->assertStatus(200);
    }

    public function test_formsOrderStore()
    {
        $data = [
            "name" => "name",
            "phone" => "phone",
            "email" => "555@fdd",
            "comment" => "comment",
        ];
        $response = $this->post(route('forms.order.store'), $data);
        $response->assertStatus(200);
    }

    public function test_formsFeedbackStore()
    {

        $data = [
            "name" => "name",
            "comment" => "comment",
        ];
        $response = $this->post(route('forms.feedback.store'), $data);
        $response->assertStatus(200);
    }

}
