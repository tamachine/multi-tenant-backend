<?php

namespace App\Imports;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Str;

class BlogPostsImport implements ToModel, WithStartRow, WithChunkReading, WithBatchInserts
{
    public function startRow(): int
    {
        return 2;
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
        $post = new BlogPost([
            'id' => $row[0], //id 0
            //'hashid' => $row[1],
            'title' => $row[1], // title
            'slug' => Str::of($row[1])->slug('-'), //
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
            'top' => 1,
            'show_date' => 1
        ]);

        $image = Storage::get('app/Paris.jpg');

        dd($image);

        $post->uploadImage($image, 'Image name');

        return $post;
    }

    protected function getDateTimeString($row): string
    {
        $date = $row;

        if (is_numeric($date)) {
            $date = ($date - 25569) * 86400;
        }

        return Carbon::parse($date)->toDateTimeString();
    }


}
