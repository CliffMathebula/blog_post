<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\BlogCard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BlogCardTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(BlogCard::class);

        $component->assertStatus(200);
    }
}
