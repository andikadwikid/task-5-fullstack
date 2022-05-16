<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function category_create()
    {
        $this->withoutExceptionHandling();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // $category = Category::create([
        //     'name' => 'test',
        //     'user_id' => User::all()->random()->id,
        // ]);

        $response = $this->post(route('category.store'), [
            'name' => 'test',
            'user_id' => User::all()->random()->id,
        ]);
        $response->assertRedirect(route('category.index'));
    }

    /** @test */
    public function category_show()
    {
        $this->withoutExceptionHandling();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $category = Category::create([
            'name' => 'test',
            'user_id' => User::all()->random()->id,
        ]);


        $response = $this->get(route('category.show', $category->id));
        $response->assertOk();
    }

    /** @test */
    public function category_update()
    {
        $this->withoutExceptionHandling();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $category = Category::create([
            'name' => 'test',
            'user_id' => User::all()->random()->id,
        ]);

        $data = [
            'name' => 'test2',
            'user_id' => User::all()->random()->id,
        ];

        $response = $this->put(route('category.update', $category->id), $data);
        $response->assertRedirect(route('category.index'));
    }

    /** @test */
    public function category_delete()
    {
        $this->withoutExceptionHandling();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $category = Category::create([
            'name' => 'test',
            'user_id' => User::all()->random()->id,
        ]);

        $response = $this->delete(route('category.destroy', $category->id));
        $response->assertRedirect(route('category.index'));
    }
}
