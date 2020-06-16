#!/usr/bin/env bash
function echo_and_run {
  echo '>' "$1"
  eval ${1}
}

phprun=$(which php)
echo_and_run 'rm -rf generation/code/*'
echo_and_run 'rm -rf var/generation/*'
echo_and_run 'rm -rf var/view_preprocessed/*'
echo_and_run 'rm -rf pub/static/_cache/*'
echo_and_run 'rm -rf pub/static/_requirejs/*'
echo_and_run 'rm -rf var/page_cache/*'
echo_and_run 'rm -rf var/cache/*'
echo_and_run 'rm -rf pub/static/adminhtml/*'
echo_and_run 'rm -rf pub/static/frontend/*'
echo ''
echo_and_run "${phprun} -d memory_limit=-1 bin/magento setup:upgrade"
echo ''
echo_and_run "${phprun} -d memory_limit=-1 bin/magento setup:di:compile"
echo ''
echo_and_run 'chmod -R 777 var pub'
echo ''
echo_and_run "grunt clean"
echo ''
echo_and_run "grunt exec:backend"
echo ''
echo_and_run "grunt less:backend"
echo ''
echo_and_run "grunt exec:blank"
echo ''
echo_and_run "grunt less:blank"
echo ''
echo_and_run "grunt exec:luma"
echo ''
echo_and_run "grunt less:luma"
echo ''
echo_and_run "${phprun} -d memory_limit=-1 bin/magento cache:clean"
#echo ''
#echo_and_run "grunt watch"
echo ''
