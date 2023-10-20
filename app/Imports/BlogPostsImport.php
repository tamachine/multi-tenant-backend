<?php

namespace App\Imports;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Hashids\Hashids;
use Maatwebsite\Excel\Row;

class BlogPostsImport implements ToModel, WithStartRow, WithChunkReading, WithBatchInserts, onEachRow
{
    protected Hashids $hashids;

    public function __construct()
    {
        $this->hashids = new Hashids();
    }

    public function startRow(): int
    {
        return 1;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    protected function getId()
    {
        return rand(100, 100000);
    }

    public function model(array $row): BlogPost
    {
        return new BlogPost([
            'id' => $row[0], //id 0
            'hashid' => $this->hashids->encode($row[0], 2, 3),
            'title' => $row[1], // title
            'slug' => $row[11], //
            'published_at' => $row[4],
            'summary' => $row[2], //short text 2
            'content' => $row[3], // long text 3
            'featured_image' => null,
            'featured_image_hover' => null,
            'blog_author_id' => rand(1, 5),
            'blog_category_id' => rand(1, 5),
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
            'hero' => 0,
            'top' => rand(0, 1),
            'show_date' => 1
        ]);
    }

    protected function getDateTimeString($row): string
    {
        $date = $row;

        if (is_numeric($date)) {
            $date = ($date - 25569) * 86400;
        }

        return Carbon::parse($date)->toDateTimeString();
    }

    public function onRow(Row $row): void
    {
        $id = $row->toArray()[0];

        $post = BlogPost::find($id);

        $featuredImage = $post->images()->create([
            'image_path' => "blogpost/migrated_from_ra/{$id}.png",
            'alt' => $post->title
        ]);

        $post->update(['featured_image' => $featuredImage->id]);

        // images
        $files = Storage::disk('public')->allFiles("images/blogpost/migrated_from_ra/{$id}");

        if($files) {
            foreach ($files as $file) {
                $post->images()->create([
                    'image_path' => str_replace('images/', '', $file),
                    'alt' => $post->title
                ]);
            }
        }
    }
}
