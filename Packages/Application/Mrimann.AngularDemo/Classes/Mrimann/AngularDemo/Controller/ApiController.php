<?php
namespace Mrimann\AngularDemo\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Mrimann.AngularDemo".   *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class ApiController extends \TYPO3\Flow\Mvc\Controller\RestController {

	protected $defaultViewObjectName = 'TYPO3\\Flow\\Mvc\\View\\JsonView';

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
}