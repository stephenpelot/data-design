<?php

class Post {
	private $postId;
	private $postUserId;
	private $postContent;
	private $postDate;

	public function __construct($newPostId, $newPostUserId, string $newPostContent, $newPostDate = null) {
		try {
			$this->setpostId($newPostId);
			$this->setpostUserId($newPostUserId);
			$this->setPostContent($newPostContent);
			$this->setPostDate($newPostDate);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError | \$exception){
			$exceptiontype = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));

		}
	}

	/**
	 * accessor method for post id
	 *
	 * @return Uuid value of post id
	 */

	public function getPostId(): Uuid {
		return ($this->postId);
	}

//this outside of class
//$post->getPostId()


/**
 *
 * mutator method for post id
 *
 * @param Uuid|string $newPostId new value of post id
 * @throws \RangeException if new post id is not positive
 * @throws |TypeError if @newPostId is not uuid or string
 */
public
function setPostId($newPostId): void {
	try {
		$uuid = self::validateUuid($newPostId);
	}
	{
	catch
		(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception)
}
$this->postId = $uuid;
}

/**
 * accessor method for post user id
 *
 * @return Uuid value of post user id
 **/

public
function getPostUserId(): Uuid {
	return ($this->postUserId);
}

/**
 * mutator method for post user id
 *
 * @param string | Uuid $newPostUserId new value of post user id
 * @throws \RangeException if $newUserId is not positive
 * @throws \TypeError if $newPostUserId is not an integer
 **/

public
function setPostUserId($newPostUserId): void {
	try {
		$uuid = self::validateUuid($newPostUserId);
	} catch(\InvalidArgumentException |\ RangeException |\Exception |\TypeError $exception) {
		$exceptionType = get_class($exception);
		throw (new$exceptionType($exception->getMessage(), 0, $exception));
		// convert and store the user id
		$this->postUserId = $uuid;
	}
}

/**
 * accessor method for post content
 *
 * @return string value of post content
 **/

public
function getPostContent(): string {
	return ($this->postContent);
}

/**
 * mutator method for post content
 *
 * @param string $newPostContent new value of post content
 * @throws \InvalidArgumentException if $newPostContent is not a string or insecure
 * @throws \RangeException if $newPostContent is > 2000 characters
 * @throws \TypeError if $newPostContent is not a string
 **/

public
function setPostContent(string $newPostContent): void {
	//verify the post content is secure
	$newPostContent = trim($newPostContent);
	$newPostContent = filter_var($newPostContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($newPostContent) === true) {
		throw(new \InvalidArgumentException("post content is empty or insecure"));
	}
	//verify the post content will fit in the database
	if(strlen($newPostContent) >= 2000) {
		throw(new \RangeException("post content is too large"))
	}

	//store the post content
	$this->postContent = $newPostContent;

	/**
	 * accessor method for post date
	 *
	 * @return \DateTime value of post date
	 **/

	public
	function getPostDate(): \DateTime {
		return ($this->postDate);
	}

	/**
	 * mutator method for post date
	 *
	 * @param \DateTime|string|null $newPostDate tweet date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newPostDate is not a valid object or string
	 * @throws \RangeException if $newPostDate is a date that does not exist
	 **/

	public
	function setPostDate($newPostDate = null): void {
		// base case: if the date is null, use the current date and time
		if($newPostDate === null) {
			$this->postDate = new /DateTime();
			return;
		}

	}

	//store the like date using the ValidateDate trait
	try {
		$newPostDate = self::validateDateTime($newPostDate);
	} catch(\InvalidArgumentException |\RangeException $exception) {
		$exceptionType = get_class($exception);
		throw(new $exceptionType($exception->getMessage(), 0, $exception));
	}
	$this->postDate = $newPostDate;

}
}