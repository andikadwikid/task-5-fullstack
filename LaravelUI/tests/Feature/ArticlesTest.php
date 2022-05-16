<?php

namespace Tests\Feature;

use App\Models\Articles;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ArticlesTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function article_create()
    {
        Storage::fake('image');

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $auth = Auth::login($user);
        Category::create([
            'name' => 'test',
            'user_id' => User::all()->random()->id,
        ]);

        $response = $this->post(route('article.store'), [
            'title' => 'new Article',
            'content' => 'this is content',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'category_id' => Category::all()->random()->id,
            'user_id' => 1,
        ]);

        $response->assertRedirect(route('article.index'));
    }

    /** @test */
    public function article_show()
    {
        Storage::fake('image');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Category::create([
            'name' => 'test',
            'user_id' => User::all()->random()->id,
        ]);

        $article = Articles::create([
            'title' => 'new Article',
            'content' => 'this is content',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ]);


        $response = $this->get(route('article.show', $article->id));
        $response->assertOk();
    }

    /** @test */
    public function article_update()
    {
        Storage::fake('image');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Category::create([
            'name' => 'test',
            'user_id' => User::all()->random()->id,
        ]);

        $article = Articles::create([
            'title' => 'new Article',
            'content' => 'this is content',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ]);

        $data = [
            'title' => 'Update Article',
            'content' => 'this is content',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];

        $response = $this->put(route('article.update', $article->id), $data);
        $response->assertRedirect(route('article.index'));
    }

    /** @test */
    public function article_delete()
    {
        Storage::fake('image');

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        Category::create([
            'name' => 'test',
            'user_id' => User::all()->random()->id,
        ]);

        $article = Articles::create([
            'title' => 'Update Article',
            'content' => 'this is content',
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ]);

        $response = $this->delete(route('article.destroy', $article->id));
        $response->assertRedirect(route('article.index'));
    }
}
