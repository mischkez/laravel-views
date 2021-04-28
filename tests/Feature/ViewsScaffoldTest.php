<?php

namespace Mischkez\LaravelViews\Tests\Feature;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ViewsScaffoldTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_view_files()
    {
        Artisan::call('scaffold:views posts index show edit');
        $this->assertTrue(File::exists(base_path() . '/resources/views/posts/' . 'index.blade.php'));
        $this->assertTrue(File::exists(base_path() . '/resources/views/posts/' . 'show.blade.php'));
    }

    /**
     * @test
     */
    public function it_creates_parital_view_files()
    {
        Artisan::call('scaffold:views posts/includes p_comment_form');
        $this->assertTrue(File::exists(base_path() . '/resources/views/posts/includes/' . 'comment_form.blade.php'));
    }
}