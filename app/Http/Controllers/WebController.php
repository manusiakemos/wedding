<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function welcome()
    {
        return redirect()->route('wedding');
    }

    public function wedding($invitationUrl = "hw")
    {
        $q = [
            'galleries' => function ($query) {
                $query->orderBy("created_at", "asc");
            },
            'theme'
        ];

        $invitation = Invitation::with($q)
            ->where("invitation_url", "=", $invitationUrl)
            ->firstOrFail();
        $meta = json_decode($invitation->invitation_meta, true);
        $cover_image = $invitation->getFirstMedia('cover_image')->getUrl('thumb');
        $male_image = $invitation->getFirstMediaUrl('male_image');
        $female_image = $invitation->getFirstMediaUrl('female_image');
        return view("themes.{$invitation->theme->key}.index", compact('invitation', 'meta', 'cover_image', 'male_image', 'female_image'));
    }

}
