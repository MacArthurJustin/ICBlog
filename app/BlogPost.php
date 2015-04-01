<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blog_posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'title', 'body', 'posted_at'];
	
	/**
	 * Foreign Key link Many to One with User.
	 *
	 * @return BelongsTo Containing User who made Post
	 */
	public function user()
    {
        return $this->belongsTo('App\User');
    }
	
	/**
	 * Foreign Key link One to Many with Blog Comments.
	 *
	 * @return HasMany Containing Comments made by user
	 */
	public function comments() {
		return $this->hasMany('App\BlogComment', 'post_id');
	}
	
	/**
	 * Published Scope. Allows Model to select Blog Posts that have passed the Posted_At Date.
	 *
	 * @param Mixed $query The Query to run the Where on
	 */
	public function scopePublished($query) {
		$query->where('posted_at', '<=', Carbon::now());
	}
	
	
	/**
	 * Unpublished Scope. Allows Model to select Blog Posts that have not passed the Posted_At Date.
	 *
	 * @param Mixed $query The Query to run the Where on
	 */
	public function scopeUnpublished($query) {
		$query->where('posted_at', '>', Carbon::now());
	}
	
	/**
	 * Allows Posted_At to be set properly.
	 *
	 * @param Date #date The date to set Posted_At to
	 */
	public function setPostedAtAttribute($date) {
		$this->attributes['posted_at'] = Carbon::parse($date);
	}
}
