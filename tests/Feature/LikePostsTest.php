<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikePostsTest extends TestCase
{
    public function a_post_can_be_liked()
    {
        $post = factory(Post::class)->create();
        $post->like();
        $this->assertCount(1, $post->likes);
    }
}
