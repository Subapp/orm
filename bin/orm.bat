@echo off
if "%PHPBIN%" == "" set PHPBIN=php
"%PHPBIN%" "Subapp\Orm" %*