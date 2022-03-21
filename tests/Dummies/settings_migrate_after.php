<?php

use Illuminate\Support\Arr;
use Nabcellent\Laraconfig\Eloquent\Setting as Model;
use Nabcellent\Laraconfig\Facades\Setting;

Setting::name('foo')->default('new_default');

Setting::name('quz')->boolean()->default(true)->bag('bar_bag')->from('foo');

Setting::name('cougar')->string()
    ->from('baz')
    ->using(static function (Model $setting): string {
        return Arr::first($setting->value ?? $setting->default);
    });
