<?php

namespace App\Policies;
use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;
/**  防止恶意请求url **/
class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function destory(User $user,Article $article){
        return $user->id === $article->user_id;
    }
}
