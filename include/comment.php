<?php
/**
 * Comments API - Constants
 *
 * @author DIGO
 */
	function getVideoCommentThreads(Google_Service_YouTube $youtube, $videoId) {
		$videoCommentThreads = $youtube->commentThreads->
			listCommentThreads('snippet', array(
				'videoId' => $videoId,
				'textFormat' => 'plainText',
				'maxResults' => 10,
				'order' => 'relevance'
		));
		return $videoCommentThreads->getItems();
	}

	function getTextOriginal(Google_Service_YouTube_CommentThread $videoCommentThread) {
		return $videoCommentThread->getSnippet()->getTopLevelComment()->
			getSnippet()->getTextOriginal();
	}

	function getCommentId(Google_Service_YouTube_CommentThread
		$videoCommentThread) {
		return $videoCommentThread->getSnippet()->getTopLevelComment()->getId();
	}

	function getCommentAuthor(Google_Service_YouTube_CommentThread
		$videoCommentThread) {
		return $videoCommentThread->getSnippet()->getTopLevelComment()->
			getSnippet()->getAuthorDisplayName();
	}

?>
