<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery\MockInterface;

class UrlControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_index_when_access_to_root(): void
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('index')
            ->assertViewMissing('short_url');
    }

    public function test_url_registered_when_valid_url_post(): void
    {
        $this->post('/shorten', ['url' => 'https://example.com'])
            ->assertRedirect(route('url.index'));

        $this->assertDatabaseHas('urls', ['url' => 'https://example.com']);
    }

    public function test_show_index_with_error_when_invalid_url_post(): void
    {
        $this->post('/shorten', ['url' => 'invalid-value-as-url'])
            ->assertRedirect(route('url.index'))
            ->assertSessionHasErrors(['url']);

        $this->assertDatabaseMissing('urls', ['url' => 'invalid-value-as-url']);
    }

    // FIXME: NanoidClientのgenerateIdか、Urlモデルのuid属性取得をモック化したいが、モックにできておらず失敗する。
    public function test_500_when_uid_collision(): void
    {
        // 生成するUIDが常に 'abcde12345' となるようにモック化
        $this->mock(Url::class, function (MockInterface $mock) {
            $mock->shouldReceive('getAttribute')
                ->once()
                ->with('uid')
                ->andReturn('abcde12345');
        });

        // 重複させるために1件事前登録
        Url::factory()->make()->save();

        $this->post('/shorten', ['url' => 'https://example.com'])
            ->assertServerError();
    }

    public function test_redirect_expanded_url_when_access_to_valid_uid(): void
    {
        $url = Url::factory()->create();

        $this->get("/{$url->uid}")
            ->assertRedirect($url->url);
    }

    public function test_404_when_access_to_invalid_uid(): void
    {
        $this->get('/dummy')
            ->assertNotFound();
    }
}
