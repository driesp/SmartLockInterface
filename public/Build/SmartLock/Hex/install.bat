 @echo off

:: BatchGotAdmin
:-------------------------------------
REM  --> Check for permissions
    IF "%PROCESSOR_ARCHITECTURE%" EQU "amd64" (
>nul 2>&1 "%SYSTEMROOT%\SysWOW64\cacls.exe" "%SYSTEMROOT%\SysWOW64\config\system"
) ELSE (
>nul 2>&1 "%SYSTEMROOT%\system32\cacls.exe" "%SYSTEMROOT%\system32\config\system"
)

REM --> If error flag set, we do not have admin.
if '%errorlevel%' NEQ '0' (
    echo Requesting administrative privileges...
    goto UACPrompt
) else ( goto gotAdmin )

:UACPrompt
    echo Set UAC = CreateObject^("Shell.Application"^) > "%temp%\getadmin.vbs"
    set params = %*:"=""
    echo UAC.ShellExecute "cmd.exe", "/c ""%~s0"" %params%", "", "runas", 1 >> "%temp%\getadmin.vbs"

    "%temp%\getadmin.vbs"
    del "%temp%\getadmin.vbs"
    exit /B

:gotAdmin
    pushd "%CD%"
    CD /D "%~dp0"
:--------------------------------------    
cls
echo Merging Softdevice, Bootloader and software!

mergehex.exe --merge softdevice.hex Smartlock.hex -o program.hex
cls
echo Merging done
echo Opening OpenOCD -> OpenOCD has to be in your path

start "OpenOCD" cmd /k openocd -f stlink-v2.cfg -f nrf51_stlink.tcl

SLEEP 2

start telnet.exe 127.0.0.1 4444

cscript telnet.vbs

taskkill /F /FI "WindowTitle eq OpenOCD *" /T
cls
echo Chip Flashed With right firmware.
echo Happy Hacking

pause