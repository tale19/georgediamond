<div class="post-share">
	<p>Share this news:</p>
	<a href="http://www.facebook.com/share.php?u={{ env('APP_URL') }}/news/{{ $post->id }}&title={{ $post->title }}" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a>
	<a href="http://twitter.com/intent/tweet?status={{ $post->title }}+{{ env('APP_URL') }}/news/{{ $post->id }}"><i class="fab fa-twitter" aria-hidden="true"></i></a>
	<a href="http://www.linkedin.com/shareArticle?mini=true&url={{ env('APP_URL') }}/news/{{ $post->id }}&title={{ $post->title }}&source={{ env('APP_URL') }}" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
	<a href="whatsapp://send?text={{ $post->title }}" data-action="share/whatsapp/share"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
	<a href="viber://forward?text={{ $post->title }}"><i class="fab fa-viber"></i></a>
</div>  <!-- news share -->