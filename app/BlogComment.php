<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blog_comments';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'post_id', 'body'];
	
	/**
	 * Foreign Key link Many to One with User.
	 *
	 * @return BelongsTo Containing User who made Comment
	 */
	public function user()
    {
        return $this->belongsTo('App\User');
    }
	
	/**
	 * Foreign Key link Many to One with BlogPost.
	 *
	 * @return BelongsTo Containing Post comment was made on
	 */
	public function post()
    {
        return $this->belongsTo('App\BlogPost', 'post_id');
    }
}
