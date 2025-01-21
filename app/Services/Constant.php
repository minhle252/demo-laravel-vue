<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\News; // Model của bài viết

class Constant
{
     /**
     * Tạo slug duy nhất từ tên bài viết, loại bỏ dấu và ký tự đặc biệt.
     *
     * @param string $title
     * @param string $modelClass
     * @return string
     */
    public static function createUniqueSlug(string $title, string $modelClass = News::class): string
    {
        // Chuyển tên bài viết sang slug
        $slug = self::removeSpecialChars(Str::slug($title));

        // Kiểm tra tính duy nhất của slug
        $originalSlug = $slug;
        $counter = 1;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Loại bỏ ký tự đặc biệt và dấu trong slug.
     *
     * @param string $string
     * @return string
     */
    private static function removeSpecialChars(string $string): string
    {
        // Loại bỏ dấu và ký tự đặc biệt
        $string = preg_replace('/[^a-z0-9\s-]/', '', $string); // Bỏ các ký tự không phải là chữ, số, dấu cách và dấu gạch ngang
        $string = preg_replace('/[\s-]+/', '-', $string); // Thay nhiều dấu cách hoặc dấu gạch ngang liên tiếp bằng một dấu gạch ngang
        $string = trim($string, '-'); // Loại bỏ khoảng trắng thừa và dấu gạch ngang ở đầu/cuối
        $string = Str::lower($string); // Chuyển tất cả ký tự thành chữ thường

        return $string;
    }

}
