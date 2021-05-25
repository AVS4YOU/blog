echo "Branch name is %BRANCH_NAME%"


if "%BRANCH_NAME%" == "production_deploy" (
echo "Deploy prod"
%msdeployv2% -verb:sync -source:iisapp="%WORKSPACE%" -dest:iisapp="www.avs4you.com\blog",computerName="34.199.206.219",username=%deploymentuser%,password=%deploymentpass% -skip:file=deploy.bat -skip:file=Jenkinsfile -skip:Directory=".git"
)

if "%BRANCH_NAME%" == "test_deploy" (
echo "Deploy test"
%msdeployv2% -verb:sync -source:iisapp="%WORKSPACE%" -dest:iisapp="avs4you.teamlab.info\blog",computerName="35.174.218.204",username=%deploymentuser%,password=%deploymentpass% -skip:file=deploy.bat -skip:file=Jenkinsfile -skip:Directory=".git"
)