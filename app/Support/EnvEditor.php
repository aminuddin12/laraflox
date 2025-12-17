<?php

namespace App\Support;

use Illuminate\Support\Facades\File;

class EnvEditor
{
    /**
     * Update or add a key to the .env file.
     *
     * @param string $key
     * @param string|null $value
     * @return bool
     */
    public static function updateKey(string $key, ?string $value): bool
    {
        $path = base_path('.env');

        if (!File::exists($path)) {
            return false;
        }

        $oldContent = File::get($path);

        if (strpos($value, ' ') !== false && strpos($value, '"') === false) {
            $value = '"' . $value . '"';
        }
        $pattern = "/^{$key}=(.*)$/m";

        if (preg_match($pattern, $oldContent)) {
            $newContent = preg_replace($pattern, "{$key}={$value}", $oldContent);
        } else {
            $newContent = $oldContent . PHP_EOL . "{$key}={$value}";
        }

        try {
            File::put($path, $newContent);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
