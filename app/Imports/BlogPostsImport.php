<?php

namespace App\Imports;

use App\Models\BlogPost;
use Carbon\Carbon;
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
            'blog_author_id' => 1,
            'blog_category_id' => 1,
            'created_at' => null,
            'updated_at' => null,
            'deleted_at' => null,
            'hero' => 1,
            'top' => 0,
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
        $post = BlogPost::find($row->getRowIndex());

        $post->images()->create([
            'image_path' => "blog/{$post->id}.png",
            'alt' => 'texto'
        ]);

        $post->featured_image = $post->id;

        $post->save();
    }
}
