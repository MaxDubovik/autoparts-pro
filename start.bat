@echo off
REM AutoParts Pro - Development Server Startup Script (Windows)
REM This script starts the PHP built-in web server

echo.
echo 🚀 Starting AutoParts Pro development server...
echo.
echo 📍 Server will be available at: http://localhost:8000
echo 📁 Document root: %CD%
echo.
echo Press Ctrl+C to stop the server
echo ----------------------------------------
echo.

REM Check if PHP is installed
where php >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo ❌ Error: PHP is not installed or not in PATH
    echo Please install PHP to continue
    pause
    exit /b 1
)

REM Start PHP server
php -S localhost:8000

