<?php

namespace Modules\Share\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Comment\Models\Comment;
use Modules\Marketing\Models\Survey;

class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'comment_id' => null,
            'commentable_id' => 2,
            'commentable_type' => Survey::class,
            'body' => 'milwad developersa ahgiagahg ghaigh ag',
            'status' => Comment::STATUS_NEW,
        ];
    }
}
