<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\InvitationGallery
 *
 * @property int $gallery_id
 * @property int $invitation_id
 * @property string $title
 * @property string|null $desc
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Invitation|null $theme
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery whereGalleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery whereInvitationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $filename
 * @method static \Illuminate\Database\Eloquent\Builder|InvitationGallery whereFilename($value)
 */
class InvitationGallery extends Model
{
    protected $primaryKey = "gallery_id";

    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function theme()
    {
        return $this->hasOne(\App\Models\Invitation::class, 'gallery_id', 'gallery_id');
    }
}
