<?php
namespace Mrimann\AngularDemo\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Mrimann.AngularDemo".   *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Entity
 */
class Idea {
	/**
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 * @Flow\Inject
	 */
	protected $persistenceManager;

	/**
	 * The title
	 * @var string
	 */
	protected $name;

	/**
	 * Returns the ID of this Idea
	 *
	 * @return string
	 */
	public function getId() {
		return $this->persistenceManager->getIdentifierByObject($this);
	}

	/**
	 * Gets the name of this idea
	 *
	 * @return string the name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}
}