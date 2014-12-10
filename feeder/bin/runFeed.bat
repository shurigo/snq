@echo off

rem Copyright 2013 Smart Focus - All rights reserved.
rem
rem This software is the confidential and proprietary information of
rem Predictive Intent Ltd ("Confidential Information"). You shall not disclose such
rem Confidential Information and shall use it only in accordance with 
rem the terms of the license agreement you entered into with Predictive Intent Ltd.
rem

rem -------------------------------------------------------------------------
rem Store our current directory - the script returns here on exit
rem -------------------------------------------------------------------------

set CURRENT_DIR=%cd%
cd ..
set UPLOAD_HOME=%cd%

rem -------------------------------------------------------------------------
rem Classpath construction
rem -------------------------------------------------------------------------

set CLASSPATH=
for /f %%f in ('dir /b lib') do call :build_cp %%f
set CLASSPATH=%UPLOAD_HOME%\resources;%CLASSPATH%

rem -------------------------------------------------------------------------
rem Clear and run the feeder import
rem -------------------------------------------------------------------------

cls

set DEBUG_ARGS=
if "%1" == "debug" (
    set DEBUG_ARGS="-Xrunjdwp:transport=dt_socket,server=y,address=8000"
)

java %DEBUG_ARGS% -Dlog4j.configuration=conf/log4j.xml -classpath %CLASSPATH% com.predictiveintent.sdk.feeder.Main %*
set EXIT_CODE=%ERRORLEVEL%

cd %CURRENT_DIR%

rem -------------------------------------------------------------------------
rem The exit status is set as the value returned from the feeder as these
rem status values are specific to error conditions encountered by the 
rem code.
rem -------------------------------------------------------------------------
pause
exit /b %EXIT_CODE%

rem -------------------------------------------------------------------------
rem Concats the classpath args
rem -------------------------------------------------------------------------

:build_cp
set CLASSPATH=%UPLOAD_HOME%\lib\%1;%CLASSPATH%
goto :eof