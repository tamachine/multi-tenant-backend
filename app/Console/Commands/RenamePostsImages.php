<?php

namespace App\Console\Commands;

use App\Models\BlogPost;
use Illuminate\Console\Command;
use Spatie\Multitenancy\Commands\Concerns\TenantAware;

class RenamePostsImages extends Command
{
    use TenantAware;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:rename-images {--tenant=} {--url=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rename images path in content of blog posts for a specific tenant';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = BlogPost::select('id', 'content')->get();
        $result = 0;

        foreach ($posts as $post) {
            $post = BlogPost::find($post->id);

            $search = [
                'https://www.reykjavikauto.com/assets/img/blog',
                'https://www.icelandcars.is/assets/img/blog',
            ];

            if ($this->contains($post->content, $search)) {

                $content = str_replace($search, "{$this->option('url')}/storage/images/blogpost/migrated_from_ic", $post->content);
                $post->content = $content;
                $post->save();
                $result ++;
            }
        }

        echo "Total {$result}" . PHP_EOL;
    }

    protected function contains($str, array $arr): bool
    {
        foreach($arr as $a) {
            if (stripos($str, $a) !== false) return true;
        }

        return false;
    }
}
