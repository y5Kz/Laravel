<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ThemeController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();
        $themes = User::THEMES; // 👈 配色テーマを定数から取得

        return view('my.name')->with([
            'user' => $user,
            'themes' => $themes
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();
        $theme_keys = array_keys(User::THEMES); // 👈 配色テーマの定数から「キー」を取得

        $request->validate([
            'theme' => ['required', Rule::in($theme_keys)]
        ]);

        $user->theme = $request->theme;
        $result = $user->save();

        return ['result' => $result];
    }
}
