<?php

namespace Modules\Share\Repositories;

class ShareRepo
{
    public static function query($model)
    {
        return $model::query();
    }

    public static function successMessage($title = 'success', $text)
    {
        return alert()->success($title, $text)->persistent("OK");
    }

    public static function errorMessage($title = 'error', $text)
    {
        return alert()->error($title, $text)->persistent("OK");
    }
}
