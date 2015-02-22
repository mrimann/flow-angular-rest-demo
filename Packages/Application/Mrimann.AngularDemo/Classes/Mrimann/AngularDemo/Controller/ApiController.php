<?php
namespace Mrimann\AngularDemo\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Mrimann.AngularDemo".   *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class ApiController extends \TYPO3\Flow\Mvc\Controller\RestController {

	protected $defaultViewObjectName = 'TYPO3\\Flow\\Mvc\\View\\JsonView';

	protected $resourceArgumentName = 'idea';

	/**
	 * @var \Mrimann\AngularDemo\Domain\Repository\IdeaRepository
	 * @Flow\Inject
	 */
	protected $ideaRepository;

	/**
	 * Returns all the ideas that are already stored in the database
	 */
	public function listAction() {
		$this->view->setVariablesToRender(array('ideas'));

		$ideas = $this->ideaRepository->findAll();
		$this->view->assign('ideas', $ideas);
	}

	/**
	 * @param \Mrimann\AngularDemo\Domain\Model\Idea $idea
	 */
	public function deleteAction(\Mrimann\AngularDemo\Domain\Model\Idea $idea) {
		$this->ideaRepository->remove($idea);
	}
}