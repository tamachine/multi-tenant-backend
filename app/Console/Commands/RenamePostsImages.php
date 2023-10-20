<?php

namespace App\Console\Commands;

use App\Models\BlogPost;
use Illuminate\Console\Command;
use App\Models\Landlord\Tenant;

class RenamePostsImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:rename-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tenant = Tenant::first();

        $tenant->makeCurrent();

        $posts = BlogPost::select('id', 'content')->get();

        foreach ($posts as $post) {
            $post = BlogPost::find($post->id);
            $search = [
                'https://www.reykjavikauto.com/assets/img/blog',
                'https://www.icelandcars.is/assets/img/blog'
            ];
            $content = str_replace($search, "/storage/images/blogpost/migrated_from_ra", $post->content);
            $post->content = $content;
            $post->save();
            echo $post->content . PHP_EOL;
        }
    }
}
