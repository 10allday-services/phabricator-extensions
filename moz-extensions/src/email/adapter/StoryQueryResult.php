<?php


class StoryQueryResult {
  /** @var string */
  public $lastKey;
  /** @var PhabricatorStory[] */
  public $stories;

  /**
   * @param string $lastKey
   * @param PhabricatorStory[] $stories
   */
  public function __construct(string $lastKey, array $stories) {
    $this->lastKey = $lastKey;
    $this->stories = $stories;
  }


}