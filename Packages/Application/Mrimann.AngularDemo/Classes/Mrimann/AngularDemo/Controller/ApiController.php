<?php
namespace Mrimann\AngularDemo\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Mrimann.AngularDemo".   *
 *                                                                        *
 *                                                                        */

use Mrimann\AngularDemo\Domain\Model\Idea;
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

	/**
	 * Surround the initialize action from the parent controller
	 */
	public function initializeCreateAction() {
		// noop
	}

	/**
	 * Create + Store a new idea
	 *
	 * @param void
	 */
	public function createAction() {
		$idea = new Idea();

		$data = $this->request->getArgument('idea');
		$idea->setName($data['name']);

		$this->ideaRepository->add($idea);

		$this->view->setVariablesToRender(array('idea'));
		$this->view->assign('idea', $idea);

		$this->response->setStatus(201);
	}
}