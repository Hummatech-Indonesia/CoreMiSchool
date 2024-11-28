<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LandingController extends Controller
{
    public function index()
    {
        try {
            $responseSchool = Http::get('https://mischool.mijurnal.com/api/schools');
            $responseNews = Http::get('https://mischool.mijurnal.com/api/news');
            $responseFaq = Http::get('https://mischool.mijurnal.com/api/faq');
            $schools = $responseSchool->json();
            $newses = $responseNews->json();
            $faqs = $responseFaq->json();

            return view('welcome', compact('schools', 'newses', 'faqs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan pada server');
        }
    }
}
