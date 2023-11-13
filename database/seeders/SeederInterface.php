<?php

namespace Database\Seeders;

interface SeederInterface {
    public function localClasses(): array;
    public function stagingClasses(): array;
    public function productionClasses(): array;
}