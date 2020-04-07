<?php

namespace DevShop\Component\GitHubApiCli\Commands;

use DevShop\Component\GitHubApiCli\GitHubApiCli;
use DevShop\Component\Common\GitRepositoryAwareTrait;

class DeploymentsCommands extends \Robo\Tasks
{

    use GitRepositoryAwareTrait;

    /**
     * @var \DevShop\Component\GitHubApiCli\GitHubApiCli
     */
    protected $cli;

    /**
     * GitHubCommands constructor.
     */
    public function __construct()
    {
        $this->cli = new GitHubApiCli();

        // Make this class aware of it's repo.
        $this->setRepository();
    }

    /**
     * Start a deployment
     * 1. Create a Deployment and a Deployment status.
     * github api deployment create opdendevshop devshop -p ref=component/github-cli -p description='COMMAND LINE DEPLOY!' -p environment=localhost -p required_contexts=
     */
    public function deploymentStart() {

        $this->io()->section('Start Deployment');
        $this->io()->table(["Repo Information"], [
          ['Current Branch', $this->getRepository()->getCurrentBranch()],
          ['Current Remote', "Fetch: " . current($this->getRepository()->getCurrentRemote())['fetch']],
          ['',               "Push: " . current($this->getRepository()->getCurrentRemote())['push']],
          ['Current Commit', $this->getRepository()->getCurrentCommit()],
        ]);



    }

    /**
     * Update deployment information.
     */
    public function deploymentUpdate() {
    }

    /**
     * End a deployment
     */
    public function deploymentEnd() {

    }

    /**
     * Delete a deployment
     */
    public function deploymentDelete() {

    }
}
