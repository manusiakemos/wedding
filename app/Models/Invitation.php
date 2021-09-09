<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Invitation
 *
 * @property int $invitation_id
 * @property int $user_id
 * @property int $theme_id
 * @property string $invitation_google_map
 * @property mixed $invitation_meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\InvitationGallery[] $galleries
 * @property-read int|null $galleries_count
 * @property-read \App\Models\Theme $theme
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereInvitationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereInvitationMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereUserId($value)
 * @mixin \Eloquent
 * @property string $invitation_url
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereInvitationUrl($value)
 * @property int $current_step
 * @property string $cover_photo
 * @property string $timezone
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereCoverPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereCurrentStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereTimezone($value)
 * @property string|null $teaser_youtube_url
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereInvitationGoogleMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereTeaserYoutubeUrl($value)
 */
class Invitation extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $primaryKey = "invitation_id";

    public bool $registerMediaConversionsUsingModelInstance = true;

    /**
     * Register the media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('male_image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png']);

        $this->addMediaCollection('female_image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png']);

        $this->addMediaCollection('cover_image')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/jpeg', 'image/png']);
    }

    /**
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(1920)
            ->performOnCollections('cover_image');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theme()
    {
        return $this->belongsTo(\App\Models\Theme::class, 'theme_id', 'theme_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function galleries()
    {
        return $this->hasMany(\App\Models\InvitationGallery::class, 'invitation_id', 'invitation_id');
    }
}
