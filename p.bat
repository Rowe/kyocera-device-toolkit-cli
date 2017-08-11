@echo off

@setlocal

set PRINTER_HELPER_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=php.exe

"%PHP_COMMAND%" "%PRINTER_HELPER_PATH%cmd.php" %*

@endlocal
