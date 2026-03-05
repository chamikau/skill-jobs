<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StorageFile implements Rule
{
    public int $maxSize;

    /* @var string[] /
    public array|null $mimes;

    /**
     * @param int $maxSize
     * @param string[] $mimes
     */
    public function __construct(int $maxSize, array $mimes=null)
    {
        $this->maxSize = $maxSize;

        $this->mimes = $mimes;
    }

    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (!Str::startsWith($value, 'tmp/')) {
            return false;
        }

        if (!Storage::exists($value)) {
            return false;
        }

        if (Storage::size($value) > $this->maxSize) {
            return false;
        }

        if (!$this->mimes) {
            return true;
        }

        return in_array(Storage::mimeType($value), $this->mimes);
    }

    public function message(): string
    {
        return 'Invalid file.';
    }
}
