<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ArticleTag extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'article_tags';

    /**
     * 記事モデルとのリレーション
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles() {
        return $this->belongsToMany(Article::class);
    }
}
