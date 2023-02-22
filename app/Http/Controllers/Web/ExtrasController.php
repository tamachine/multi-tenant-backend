<?php

namespace App\Http\Controllers\Web;

use App\Models\Car;

class ExtrasController extends BaseController
{
    public function index(Car $car)
    {
        if (!checkSessionExtras()) {
            return redirect()->route('cars');
        }

        return view(
            'web.extras.index',
            ['car' => $car]
        );
    }

    protected function footerImagePath(): string
    {
        return 'images/footer/extras.png';
    }
}
