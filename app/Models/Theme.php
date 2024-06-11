<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $text_heading
 * @property string $text_title
 * @property string $text_body
 * @property string $button_primary
 * @property string $button_secondary
 * @property string $dashboard
 * @property string $menu
 * @property string $navbar
 * @property int $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereButtonPrimary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereButtonSecondary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereDashboard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereNavbar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereTextBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereTextHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereTextTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Theme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Theme extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'themes';
    protected $fillable = [
        'name',
        'text_heading',
        'text_title',
        'text_body',
        'button_primary',
        'button_secondary',
        'dashboard',
        'menu',
        'navbar',
        'is_default',
        'menu_name',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'menu_name' => 'json',
    ];

    public function getLogoUrl(): ?string
    {
        return $this->getFirstMediaUrl('logos');
    }

    public function getBannerUrl(): ?string
    {
        return $this->getFirstMediaUrl('banners');
    }
}
