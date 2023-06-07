<?php

namespace App\Traits;

trait Sortable {
    public function scopeSortable($query)
    {


        return $query;
    }

    public static function link_to_sorting_action($col, $title = null)
    {
        $indicator = '';
        $parameters = [];

        if (is_null($title)) {
            $title = str_replace('_', ' ', $col);
            $title = ucfirst($title);
        }

        $columnNames = explode(',', Input::get('s'));
        $columnOrder = explode(',', Input::get('o'));

        if (false !== $id = array_search($col, $columnNames)) {
            $indicator = $columnOrder[$id] === 'asc' ? '&uarr;' : '&darr;';
            $parameters = array_merge(Input::get(), ['s' => $col, 'o' => ($columnOrder[$id] == 'asc' ? 'desc' : 'asc')]);
        } else {
            $parameters = array_merge(Input::get(), ['s' => $col, 'o' => 'asc']);
        }

        return link_to_route(Route::currentRouteName(), "{$title}&nbsp;{$indicator}", $parameters);
    }
}