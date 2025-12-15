<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('medical_support_url')) {
    /**
     * Generate asset URL, compatible with local/public and S3.
     */
    function medical_support_url(string $url): string
    {
        $disk = config('filesystems.default', 'public');
        $base = rtrim(config('filesystems.asset_url', '/support'), '/');
        $path = ltrim($url, '/');

        // Kalau disk-nya S3, generate via Storage
        if ($disk === 's3') {
            return Storage::disk('s3')->url($path);
        }

        // Selain S3, tetap pakai asset() lokal
        return asset($base . '/' . $path);
    }
}

if (!function_exists('medical_legal_doc_url')) {
    /**
     * Generate asset URL for legal documents, compatible with local/public and S3.
     */
    function medical_legal_doc_url(string $url): string
    {
        $disk = config('filesystems.default', 'public');
        $base = rtrim(config('filesystems.asset_url', '/legal-doc'), '/');
        $path = ltrim($url, '/');

        // Kalau disk-nya S3, generate via Storage
        if ($disk === 's3') {
            return Storage::disk('s3')->url($path);
        }

        // Selain S3, tetap pakai asset() lokal
        return asset($base . '/' . $path);
    }
}