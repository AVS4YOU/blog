pipeline {
 agent { label 'master' }
  triggers {
    githubPush()
  }
    options {
    disableConcurrentBuilds()
    buildDiscarder (logRotator(numToKeepStr: '3', artifactNumToKeepStr: '3'))
     }
  stages {
        stage('deploy') {
		steps {
			
			withCredentials([
            		usernamePassword(credentialsId: 'deploymentuser_pass', usernameVariable: 'deploymentuser', passwordVariable: 'deploymentpass')
					])
			{
	
			bat 'deploy.bat'

                      							
      	}
      }
    }
  }
}
