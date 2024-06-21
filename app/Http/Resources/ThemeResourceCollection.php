<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThemeResourceCollection extends JsonResource
{

    public function toArray($request): array
    {
        $logoUrl = $this->getFirstMediaUrl('logos');
        $bannerUrl = $this->getFirstMediaUrl('banners');
        $menuItems = json_decode($this->menu_name);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'text_heading_primary' => $this->text_heading,
            'text_heading_secondary' => $this->text_heading_secondary,
            'text_title' => $this->text_title,
            'text_body' => $this->text_body,
            'button_primary' => $this->button_primary,
            'button_secondary' => $this->button_secondary,
            'dashboard_primary' => $this->dashboard,
            'menu_primary' => $this->menu,
            'header_primary' => $this->navbar,
            'is_default' => $this->is_default,
            'menu_items' => $menuItems,
            'logo_url' => $logoUrl,
            'banner_url' => $bannerUrl,
        ];
    }
}
