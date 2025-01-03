<?php
namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Foydalanuvchi tizimga kirganligini tekshirish
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Foydalanuvchi tizimga kirmagan!');
        }

        // So'rovni tasdiqlash
        $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required',
            'file' => 'file|mimes:png,jpg,pdf',
        ]);

        // Faylni saqlash
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('file', $name, 'public');
        }

        // Ariza yaratish
        $application = Application::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'file_url' => $path ?? null,
        ]);

        return redirect()->back()->with('success', 'Ariza muvaffaqiyatli yaratildi!');
    }
}

?>
