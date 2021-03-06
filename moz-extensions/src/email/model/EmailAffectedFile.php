<?php


class EmailAffectedFile {
  /** @var string */
  public $path;
  /** @var string one of "added", "removed" or "modified" */
  public $change;

  /**
   * @param string $path
   * @param string $change
   */
  public function __construct(string $path, string $change) {
    $this->path = $path;
    $this->change = $change;
  }

  public static function from(DifferentialChangeset $changeset) {
    $filename = '/'.$changeset->getDisplayFilename();
    $changeType = $changeset->getChangeType();
    if ($changeType == DifferentialChangeType::TYPE_ADD) {
      $change = 'added';
    } else if ($changeType == DifferentialChangeType::TYPE_DELETE) {
      $change = 'removed';
    } else {
      // There's a BUNCH of DifferentialChangeType constants in here, but we're going to call them all
      // "modified" to avoid overloading the user with a bunch of possible change states.
      // It could be worth refining this in the future.
      $change = 'modified';
    }
    return new EmailAffectedFile($filename, $change);
  }


}