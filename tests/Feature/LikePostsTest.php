<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikePostsTest extends TestCase
{
    use RefreshDatabase;

    public function a_post_can_be_liked()
    {
        $this->actingAs(factory(User::class)->create());
        $post = factory(Post::class)->create();
        $post->like();
        $this->assertCount(1, $post->likes);

        $this->assertTrue($post->likes->contain('id', auth()->id()));
    }

    public function a_comment_can_be_liked()
    {
        $this->actingAs(factory(User::class)->create());
        $comment = factory(Comment::class)->create();
        $comment->like();
        $this->assertCount(1, $comment->likes);

        $this->assertTrue($comment->likes->contain('id', auth()->id()));
    }
}
