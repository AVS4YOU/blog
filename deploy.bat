%msdeployv2% -verb:sync -source:iisapp="%WORKSPACE%" -dest:iisapp="avs4you.teamlab.info\blog",computerName="35.174.218.204",username=%deploymentuser%,password=%deploymentpass% -skip:file=deploy.bat -skip:file=Jenkinsfile
