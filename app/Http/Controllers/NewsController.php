<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug)
    {
        $responseNews = Http::get('https://mischool.mijurnal.com/api/news');
        $responseCategories = Http::get('https://mischool.mijurnal.com/api/news-category');
        $newses = $responseNews->json('news');
        $categories = $responseCategories->json();

        $filteredNews = array_filter($newses, function ($news) use ($slug) {
            return $news['slug'] === $slug;
        });

        $news = !empty($filteredNews) ? array_values($filteredNews)[0] : null;
        return view('landing.news.detail', compact('news', 'categories'));
    }
}
